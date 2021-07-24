<?php

namespace App\Filament\Resources\OrderResource\RelationManagers;

use Filament\Resources\Forms\Components;
use Filament\Resources\Forms\Form;
use Filament\Resources\RelationManager;
use Filament\Resources\Tables\Columns;
use Filament\Resources\Tables\Table;

class ProductsRelationManager extends RelationManager
{
    public static $primaryColumn = 'name';

    public static $relationship = 'products';

    public static function form(Form $form)
    {
        return $form
            ->schema([
                Components\TextInput::make('name')->required(),
                Components\TextInput::make('quantity')->required(),
                Components\KeyValue::make('details'),
            ]);
    }

    public static function table(Table $table)
    {
        return $table
            ->columns([
                Columns\Text::make('name')->primary(),
                Columns\Text::make('quantity'),
            ]);
    }
}
