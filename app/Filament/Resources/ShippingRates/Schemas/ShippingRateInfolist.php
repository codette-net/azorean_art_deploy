<?php

namespace App\Filament\Resources\ShippingRates\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ShippingRateInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('shipping_zone_id')
                    ->numeric(),
                TextEntry::make('weight_from_grams')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('weight_to_grams')
                    ->numeric()
                    ->placeholder('-'),
                TextEntry::make('amount_cents')
                    ->numeric(),
                TextEntry::make('notes')
                    ->placeholder('-')
                    ->columnSpanFull(),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->placeholder('-'),
                TextEntry::make('updated_at')
                    ->dateTime()
                    ->placeholder('-'),
            ]);
    }
}
