<?php

namespace App\Filament\Resources\OrderItems\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class OrderItemForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('order_id')
                    ->required()
                    ->numeric(),
                TextInput::make('product_variant_id')
                    ->required()
                    ->numeric(),
                TextInput::make('title_snapshot')
                    ->required(),
                TextInput::make('unit_price_cents')
                    ->required()
                    ->numeric(),
                TextInput::make('quantity')
                    ->required()
                    ->numeric(),
                TextInput::make('total_cents')
                    ->required()
                    ->numeric(),
            ]);
    }
}
