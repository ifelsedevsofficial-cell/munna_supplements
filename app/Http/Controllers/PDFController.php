<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    public function print(string $model, int $id)
    {
        $handlePrint = $this->printHandler();

        if (!isset($handlePrint[$model])) {
            abort(404, "No printable handler for model {$model}");
        }

        return $handlePrint[$model]($id);
    }

    protected function printOrderReceipt($orderId)
    {
        $order = Order::findOrFail($orderId);

        $pdf = Pdf::loadView('print.orders-receipt-print', ['order' => $order])
            ->stream('MS-' . $order->id . '.pdf');

        return $pdf;
    }

    protected function printHandler()
    {
        return [
            class_basename(Order::class) => fn($id) => $this->printOrderReceipt($id),
        ];
    }
}
