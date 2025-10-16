<?php

namespace App\Filament\Support\Actions;

use App\Models\Order;
use Filament\Actions\Action;

class CustomAction
{

    public static function printOrderReceipt()
    {

        return Action::make('print_order_receipt')
            // ->label('Print PO')
            ->color('gray')
            ->icon('heroicon-s-printer')
            ->url(fn($record) => route('pdf.print', [
                'model' => class_basename(Order::class),
                'id'    => $record->id,
            ]))
            ->openUrlInNewTab();
    }
}
