<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookingResource\Pages;
use App\Filament\Resources\BookingResource\RelationManagers;
use App\Models\Booking;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BookingResource extends Resource
{
    protected static ?string $model = Booking::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('user_id')
                    ->label('User ID')
                    ->required()
                    ->numeric(),

                Forms\Components\TextInput::make('product_id')
                    ->label('Product ID')
                    ->required()
                    ->numeric(),

                Forms\Components\TextInput::make('product_name')
                    ->label('Product Name')
                    ->required(),

                Forms\Components\TextInput::make('product_price')
                    ->label('Product Price')
                    ->required()
                    ->numeric(),

                Forms\Components\TextInput::make('quantity')
                    ->label('Quantity')
                    ->required()
                    ->numeric(),

                Forms\Components\DatePicker::make('start_date')
                    ->label('Start Date')
                    ->required(),

                Forms\Components\DatePicker::make('end_date')
                    ->label('End Date')
                    ->required(),

                Forms\Components\Select::make('pickup_method')
                    ->label('Pickup Method')
                    ->options([
                        'pickup' => 'Pickup',
                        'delivery' => 'Delivery',
                    ])
                    ->required(),

                Forms\Components\TextInput::make('delivery_address')
                    ->label('Delivery Address')
                    ->nullable(),

                Forms\Components\TextInput::make('store_location')
                    ->label('Store Location')
                    ->nullable(),

                Forms\Components\TextInput::make('full_name')
                    ->label('Full Name')
                    ->required(),

                Forms\Components\TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required(),

                Forms\Components\TextInput::make('phone')
                    ->label('Phone')
                    ->required(),

                Forms\Components\TextInput::make('id_number')
                    ->label('ID Number')
                    ->required(),

                Forms\Components\Textarea::make('address')
                    ->label('Address')
                    ->required(),

                Forms\Components\TextInput::make('emergency_name')
                    ->label('Emergency Contact Name')
                    ->required(),

                Forms\Components\TextInput::make('emergency_phone')
                    ->label('Emergency Contact Phone')
                    ->required(),

                Forms\Components\Textarea::make('special_notes')
                    ->label('Special Notes')
                    ->nullable(),

                Forms\Components\Select::make('status')
                    ->label('Status')
                    ->options([
                        'pending' => 'Pending',
                        'confirmed' => 'Confirmed',
                        'canceled' => 'Canceled',
                    ])
                    ->required(),

                Forms\Components\TextInput::make('total_price')
                    ->label('Total Price')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user_id')->label('User ID'),
                Tables\Columns\TextColumn::make('product_id')->label('Product ID'),
                Tables\Columns\TextColumn::make('product_name')->label('Product Name'),
                Tables\Columns\TextColumn::make('product_price')->label('Product Price'),
                Tables\Columns\TextColumn::make('quantity')->label('Quantity'),
                Tables\Columns\TextColumn::make('start_date')->label('Start Date'),
                Tables\Columns\TextColumn::make('end_date')->label('End Date'),
                Tables\Columns\TextColumn::make('pickup_method')->label('Pickup Method'),
                Tables\Columns\TextColumn::make('status')->label('Status'),
                Tables\Columns\TextColumn::make('total_price')->label('Total Price'),
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
            'index' => Pages\ListBookings::route('/'),
            'create' => Pages\CreateBooking::route('/create'),
            'edit' => Pages\EditBooking::route('/{record}/edit'),
        ];
    }
}
