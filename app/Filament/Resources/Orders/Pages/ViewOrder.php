<?php

namespace App\Filament\Resources\Orders\Pages;

use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;
use App\Filament\Support\Actions\CustomAction;
use App\Filament\Resources\Orders\OrderResource;

class ViewOrder extends ViewRecord
{
    protected static string $resource = OrderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
            CustomAction::printOrderReceipt(),
        ];
    }
}
