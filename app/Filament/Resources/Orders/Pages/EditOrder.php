<?php

namespace App\Filament\Resources\Orders\Pages;

use App\Filament\Resources\Orders\OrderResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;
use App\Services\OrderPricingService;

class EditOrder extends EditRecord
{
    protected static string $resource = OrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        return app(OrderPricingService::class)->calculateOrderTotals($data);
    }

    protected function afterSave(): void
    {
        app(OrderPricingService::class)->syncOrderTotalsFromRecord($this->record);
    }
}
