<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductSubscriptionResource\Pages;
use App\Filament\Resources\ProductSubscriptionResource\RelationManagers;
use App\Models\Product;
use App\Models\ProductSubscription;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Nette\Utils\Image;

class ProductSubscriptionResource extends Resource
{
    protected static ?string $model = ProductSubscription::class;

    protected static ?string $navigationIcon = 'heroicon-o-credit-card';

    protected static ?string $navigationGroup = 'Transactions';

    public static function getNavigationBadge(): ?string
    {
        return (string) ProductSubscription::where('is_paid', false)->count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                    Step::make('Product and Price')->schema([
                        Grid::make(2)->schema([
                            Select::make('product_id')
                                ->relationship('product', 'name')
                                ->searchable()
                                ->preload()
                                ->required()
                                ->live()
                                ->afterStateUpdated(function ($state, callable $set){
                                    $product = Product::find($state);
                                    $price = $product ? $product->price_per_person : 0;
                                    $duration = $product ? $product->duration : 0;

                                    $set('price', $price);
                                    $set('duration', $duration);

                                    $tax = 0.12;
                                    $totalTaxAmount = $price * $tax;

                                    $totalAmount = $price + $totalTaxAmount;
                                    $set('total_amount', number_format($totalAmount, 0, '', ''));
                                    $set('total_tax_amount', number_format($totalTaxAmount, 0, '', ''));
                                })
                                ->afterStateHydrated(function (callable $get, callable $set, $state) {
                                    $productId = $state;
                                    if($productId) {
                                        $product = Product::find($productId);
                                        $price = $product ? $product->price : 0;
                                        $set('price', $price);

                                        $tax = 0.12;
                                        $totalTaxAmount = $price * $tax;
                                        $set('total_tax_amount', number_format($totalTaxAmount, 0, '', ''));
                                    }
                                }),

                            TextInput::make('price')
                                ->required()
                                ->label('Price per Person')
                                ->readOnly()
                                ->numeric()
                                ->prefix('IDR'),

                            TextInput::make('total_amount')
                                ->required()
                                ->readOnly()
                                ->numeric()
                                ->prefix('IDR'),

                            TextInput::make('total_tax_amount')
                                ->required()
                                ->readOnly()
                                ->numeric()
                                ->prefix('IDR'),

                            TextInput::make('duration')
                                ->required()
                                ->readOnly()
                                ->numeric()
                                ->prefix('Days'),
                        ]),
                    ]),
                    Step::make('Customer Information')->schema([
                        Grid::make(2)->schema([
                            TextInput::make('name')->required()->maxLength(255),
                            TextInput::make('phone')->required()->maxLength(255),
                            TextInput::make('email')->required()->maxLength(255),
                        ])
                    ]),

                    Step::make('Payment Information')->schema([
                        TextInput::make('booking_trx_id')->required()->maxLength(255),
                        TextInput::make('customer_bank_name')->required()->maxLength(255),
                        TextInput::make('customer_bank_account')->required()->maxLength(255),
                        TextInput::make('customer_bank_number')->required()->maxLength(255),

                        ToggleButtons::make('is_paid')
                            ->label('Is Paid?')
                            ->boolean()
                            ->grouped()
                            ->icons([
                                true => 'heroicon-o-pencil',
                                false => 'heroicon-o-clock',
                            ]),

                        FileUpload::make('proof')
                            ->image()
                            ->required()
                    ])
                ])
                ->columnSpan('full')
                ->columns(1)
                ->skippable()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('product.thumbnail'),
                TextColumn::make('name')->searchable(),
                TextColumn::make('booking_trx_id')->searchable(),
                IconColumn::make('is_paid')
                    ->boolean()
                    ->label('Paid')
                    ->trueColor('success')
                    ->falseColor('danger')
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('product_id')
                    ->relationship('product', 'name')
                    ->label('Product'),
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('approve')
                    ->label('Approve')
                    ->action(function (ProductSubscription $record) {
                        $record->is_paid = true;
                        $record->save();

                        Notification::make()
                            ->title('Payment Approved')
                            ->success()
                            ->body('The payment has been approved.')
                            ->send();
                    })
                ->color('success')
                ->requiresConfirmation()
                ->visible(fn (ProductSubscription $record) => !$record->is_paid),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProductSubscriptions::route('/'),
            'create' => Pages\CreateProductSubscription::route('/create'),
            'edit' => Pages\EditProductSubscription::route('/{record}/edit'),
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
