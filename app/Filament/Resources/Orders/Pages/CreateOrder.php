<?php

namespace App\Filament\Resources\Orders\Pages;

use App\Filament\Resources\Orders\OrderResource;
use Filament\Resources\Pages\CreateRecord;
use App\Services\OrderPricingService;

class CreateOrder extends CreateRecord
{

    protected static string $resource = OrderResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        return app(OrderPricingService::class)->calculateOrderTotals($data);
    }

    protected function afterCreate(): void
    {
        app(OrderPricingService::class)->syncOrderTotalsFromRecord($this->record);
    }
}
