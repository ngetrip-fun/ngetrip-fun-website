<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubscriptionGroupResource\Pages;
use App\Filament\Resources\SubscriptionGroupResource\RelationManagers;
use App\Models\Product;
use App\Models\SubscriptionGroup;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Nette\Utils\Image;

class SubscriptionGroupResource extends Resource
{
    protected static ?string $model = SubscriptionGroup::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('product_id')
                    ->relationship('product', 'name')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->live()
                    ->afterStateUpdated(function ($state, callable $set){
                        $product = Product::find($state);
                        $max_capacity = $product ? $product->capacity : 0;

                        $set('max_capacity', $max_capacity);
                    })
                    ->afterStateHydrated(function (callable $get, callable $set, $state){
                        $productId = $state;
                        if($productId) {
                            $product = Product::find($productId);
                            $max_capacity = $product ? $product->capacity : 0;

                            $set('max_capacity', $max_capacity);
                        }
                    }),

                TextInput::make('max_capacity')
                    ->required()
                    ->label('Max Capacity')
                    ->readOnly()
                    ->numeric()
                    ->prefix('People'),

                TextInput::make('participant_count')
                    ->required()
                    ->label('Total Capacity')
                    ->numeric()
                    ->prefix('People'),

                Select::make('product_subscription_id')
                    ->relationship('productSubscription', 'booking_trx_id')
                    ->searchable()
                    ->preload()
                    ->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('product.thumbnail')
                    ->label('Photo'),
                TextColumn::make('productSubscription.booking_trx_id')
                    ->label('Booking ID')
                    ->searchable(),
                TextColumn::make('id')
                    ->label('Group ID')
                    ->searchable(),

                TextColumn::make('participant_count'),
                TextColumn::make('max_capacity'),
                Tables\Columns\IconColumn::make('is_full')
                    ->label('Is Full')
                    ->boolean()
                    ->getStateUsing(fn ($record) => $record->participant_count >= $record->max_capacity)
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueColor('success')
                    ->falseColor('danger'),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\GroupMessagesRelationManager::class,
            RelationManagers\GroupParticipantsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSubscriptionGroups::route('/'),
            'create' => Pages\CreateSubscriptionGroup::route('/create'),
            'edit' => Pages\EditSubscriptionGroup::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
