<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    public static function form(Form $form): Form
    {
               return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(255),
                Forms\Components\TextInput::make('description')
                ->required()
                ->maxLength(255),
                Forms\Components\TextInput::make('category')
                ->required()
                ->maxLength(255),
                Forms\Components\TextInput::make('brand')
                ->required()
                ->maxLength(255),
                Forms\Components\TextInput::make('price')
                ->required()
                ->maxLength(255),
                Forms\Components\TextInput::make('rating')
                ->required()
                ->maxLength(255),
                Forms\Components\Select::make('status')
                ->options([
                    'tersedia' => 'Tersedia',
                    'tidak-tersedia' => 'Tidak Tersedia',
                ]),
      FileUpload::make('image')
    ->image()
    ->directory('products') // taruh semua di folder products
    ->disk('public')
    ->visibility('public')
    ->imageEditor(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
            Tables\Columns\TextColumn::make('name')->searchable(),
            Tables\Columns\TextColumn::make('description'),
            Tables\Columns\TextColumn::make('category'),
            Tables\Columns\TextColumn::make('price'),
            Tables\Columns\TextColumn::make('rating'),
            Tables\Columns\TextColumn::make('brand'),
            Tables\Columns\TextColumn::make('status'),
            ImageColumn::make('image')
            ->disk('public')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
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
