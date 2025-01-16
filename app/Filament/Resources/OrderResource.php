<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Infolists\Components\View;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Actions\Action;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';

    protected static ?string $navigationGroup = 'Product Management';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\BelongsToSelect::make('user_id')
                    ->relationship('user', 'name')
                    ->label('User')
                    ->disabled()
                    ->required()
                    ->default(fn($record) => $record->user->name ?? 'User Not Found'),

                Forms\Components\TextInput::make('status')
                    ->label('Status')
                    ->required(),

                Forms\Components\TextInput::make('order_id')
                    ->label('Order ID')
                    ->disabled()
                    ->required(),

                Forms\Components\Textarea::make('message')
                    ->label('Catatan Penjual')
                    ->columnSpanFull(),

                Forms\Components\Repeater::make('products')
                    ->relationship('products')
                    ->schema([
                        Forms\Components\Select::make('product_id')
                            ->label('Product')
                            ->options(Product::all()->pluck('name', 'id'))
                            ->required()
                            ->reactive()
                            ->searchable()
                            ->columnSpan(['md' => 5]),

                        Forms\Components\TextInput::make('quantity')
                            ->label('Quantity')
                            ->numeric()
                            ->default(1)
                            ->required()
                            ->columnSpan(['md' => 2]),
                    ])
                    ->columns(3)
                    ->label('Products Purchased')
                    ->required(),

                Forms\Components\TextInput::make('total_price')
                    ->label('Total Price')
                    ->disabled()
                    ->numeric()
                    ->prefix('Rp')
                    ->default(fn($record) => $record->products->sum(fn($product) => $product->pivot->quantity * $product->price))
                    ->columnSpanFull(),
            ]);
    }

    public static function canCreate(): bool
    {
        return false;
    }

    public static function view(View $view): View
    {
        return $view
            ->schema([]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Nama')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('total_price')
                    ->label('Total Harga')
                    ->sortable()
                    ->money('idr', true),
                Tables\Columns\BadgeColumn::make('status')
                    ->label('Status')
                    ->sortable()
                    ->colors([
                        'primary' => 'pending',
                        'success' => 'success',
                        'danger' => 'failed',
                    ]),
                Tables\Columns\TextColumn::make('order_id')
                    ->label('Order ID')
                    ->sortable(),

            ])
            ->filters([])
            ->actions([
                // Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
                
            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
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
            'index' => Pages\ListOrders::route('/'),
            // 'view' => Pages\ViewOrder::route('/{record}'),
            // 'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
