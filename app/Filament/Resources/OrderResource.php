<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use Filament\Resources\Forms\Components;
use Filament\Resources\Forms\Form;
use Filament\Resources\Resource;
use Filament\Resources\Tables\Columns;
use Filament\Resources\Tables\Table;

class OrderResource extends Resource
{
    public static $icon = 'heroicon-o-collection';

    public static function form(Form $form)
    {
        return $form
            ->schema([
                Components\TextInput::make('customer')->required(),
            ]);
    }

    public static function table(Table $table)
    {
        return $table
            ->columns([
                Columns\Text::make('id')->primary(),
                Columns\Text::make('customer'),
                Columns\Text::make('products')->getValueUsing(fn (Order $order) => $order->products()->count()),
            ]);
    }

    public static function relations()
    {
        return [
            RelationManagers\ProductsRelationManager::class,
        ];
    }

    public static function routes()
    {
        return [
            Pages\ListOrders::routeTo('/', 'index'),
            Pages\CreateOrder::routeTo('/create', 'create'),
            Pages\EditOrder::routeTo('/{record}/edit', 'edit'),
        ];
    }
}
