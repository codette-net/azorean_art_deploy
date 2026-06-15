<?php

namespace App\Filament\Resources\ShippingRates\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ShippingRateForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('shipping_zone_id')
                    ->relationship('shippingZone', 'name')
                    ->searchable()
                    ->preload()
                    ->live()
                    ->required(),
                TextInput::make('weight_from_grams')
                    ->numeric(),
                TextInput::make('weight_to_grams')
                    ->numeric(),
                TextInput::make('amount_cents')
                    ->required()
                    ->numeric(),
                Textarea::make('notes')
                    ->columnSpanFull(),
            ]);
    }
}
