<?php

namespace App\Filament\Resources;

use App\Models\Product;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Filament\Resources\ProductResource\Pages;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\BadgeColumn;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';
    protected static ?string $navigationLabel = 'Produk';
    protected static ?string $pluralLabel = 'Daftar Produk';
    protected static ?string $modelLabel = 'Produk';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Section::make('Informasi Produk')
                ->description('Lengkapi detail produk dengan benar')
                ->schema([
                    Grid::make(2)->schema([
                        TextInput::make('name')
                            ->label('Nama Produk')
                            ->placeholder('Contoh: Tenda Dome 2P')
                            ->required()
                            ->maxLength(255),

                        Select::make('brand')
                            ->label('Brand')
                            ->options([
                                'eiger' => 'Eiger',
                                'rei' => 'Rei',
                                'osprey' => 'Osprey',
                                'the north face' => 'The North Face',
                                'patagonia' => 'Patagonia',
                            ])
                            ->searchable()
                            ->required(),

                        Select::make('category')
                            ->label('Kategori')
                            ->options([
                                'Tenda' => 'Tenda',
                                'Sleeping Gear' => 'Sleeping Gear',
                                'Tas & Carrier' => 'Tas & Carrier',
                                'Peralatan Masak' => 'Peralatan Masak',
                                'Peralatan Mendaki' => 'Peralatan Mendaki',
                                'Penerangan' => 'Penerangan',
                            ])
                            ->searchable()
                            ->required(),

                        TextInput::make('rating')
                            ->label('Rating')
                            ->placeholder('Contoh: 4.5')
                            ->suffixIcon('heroicon-o-star')
                            ->numeric()
                            ->required(),

                        TextInput::make('price')
                            ->label('Harga Sewa per Hari')
                            ->prefix('Rp')
                            ->placeholder('Contoh: 10000')
                            ->required()
                            ->numeric()
                            ->extraInputAttributes(['inputmode' => 'decimal'])
                            ->dehydrateStateUsing(function ($state) {
                                return is_numeric($state) ? (int) str_replace(['.', ','], '', $state) : null;
                            })
                            ->formatStateUsing(function ($state) {
                                return $state ? number_format($state, 0, ',', '.') : null;
                            }),

                        Select::make('status')
                            ->label('Status Ketersediaan')
                            ->options([
                                'tersedia' => 'Tersedia',
                                'tidak-tersedia' => 'Tidak Tersedia',
                            ])
                            ->required(),
                    ]),

                    Textarea::make('description')
                        ->label('Deskripsi Singkat')
                        ->placeholder('Contoh: Tenda kapasitas 2 orang, tahan air, ringan')
                        ->required()
                        ->rows(4)
                        ->maxLength(2000),
                ]),

            Section::make('Gambar Produk')
                ->schema([
                    FileUpload::make('image')
                        ->label('Unggah Gambar Produk')
                        ->image()
                        ->imageEditor()
                        ->directory('products')
                        ->disk('public')
                        ->visibility('public')
                        ->helperText('Gunakan gambar berkualitas tinggi dan sesuai produk.'),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->disk('public')
                    ->label('Foto')
                    ->square()
                    ->size(50),

                TextColumn::make('name')
                    ->label('Nama Produk')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('category')
                    ->label('Kategori')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('brand')
                    ->label('Brand'),

                TextColumn::make('price')
                    ->label('Harga')
                    ->formatStateUsing(fn ($state) => 'Rp' . number_format($state, 0, ',', '.')),

                BadgeColumn::make('status')
                ->label('Status')
                ->colors([
                    'success' => 'tersedia',
                    'danger' => 'tidak-tersedia',
                ])
                ->formatStateUsing(function ($state) {
                    return match ($state) {
                        'tersedia' => 'Tersedia',
                        'tidak-tersedia' => 'Tidak Tersedia',
                        default => $state,
                    };
                }),


                TextColumn::make('rating')
                    ->label('Rating')
                    ->suffix('⭐'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
