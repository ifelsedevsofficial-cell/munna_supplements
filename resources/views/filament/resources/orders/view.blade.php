<x-filament::page>
    <div class="space-y-6">

        {{-- Order Info --}}
        <x-filament::card class="bg-white shadow-lg rounded-2xl p-6">
            <x-slot name="header">
                <h2 class="text-2xl font-extrabold text-gray-800 border-b pb-2 mb-4">
                    Order #{{ $record->id }}
                </h2>
            </x-slot>

            <div class="grid grid-cols-4 sm:grid-cols-2 gap-4">
                <x-filament::badge color="primary" size="md" class="flex items-center gap-2">
                    <x-heroicon-o-user class="w-4 h-4" /> Customer: {{ $record->user->name }}
                </x-filament::badge>

                <x-filament::badge :color="$record->status === 'pending' ? 'warning' : 'success'" size="md" class="flex items-center gap-2">
                    <x-heroicon-o-tag class="w-4 h-4" /> Status: {{ ucfirst($record->status) }}
                </x-filament::badge>

                <x-filament::badge color="success" size="md" class="flex items-center gap-2">
                    <x-heroicon-o-credit-card class="w-4 h-4" /> Payment: {{ ucfirst($record->payment_status) }}
                    ({{ strtoupper($record->payment_method) }})
                </x-filament::badge>

                <x-filament::badge color="info" size="md" class="flex items-center gap-2">
                    <x-heroicon-o-banknotes class="w-4 h-4" /> Total: ${{ number_format($record->total_amount, 2) }}
                </x-filament::badge>
            </div>

        </x-filament::card>


        {{-- Order Items
        <x-filament::card>
            <x-slot name="header">
                <h3 class="text-md font-semibold">Items</h3>
            </x-slot>
            <div class="overflow-x-auto">
                <table class="w-full text-sm divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="text-left px-4 py-2">Product</th>
                            <th class="text-right px-4 py-2">Qty</th>
                            <th class="text-right px-4 py-2">Price</th>
                            <th class="text-right px-4 py-2">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($record->orderItems as $item)
                            <tr>
                                <td class="px-4 py-2">{{ $item->product->name }}</td>
                                <td class="px-4 py-2 text-right">{{ $item->quantity }}</td>
                                <td class="px-4 py-2 text-right">${{ number_format($item->price, 2) }}</td>
                                <td class="px-4 py-2 text-right">${{ number_format($item->quantity * $item->price, 2) }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </x-filament::card> --}}

        {{-- Shipping Details --}}
        {{-- @if ($record->orderDetail)
            <x-filament::card>
                <x-slot name="header">
                    <h3 class="text-md font-semibold">Shipping Details</h3>
                </x-slot>
                <div class="grid grid-cols-2 gap-4">
                    <p><strong>Address:</strong> {{ $record->orderDetail->address }}</p>
                    <p><strong>City:</strong> {{ $record->orderDetail->city }}</p>
                    <p><strong>Phone:</strong> {{ $record->orderDetail->phone }}</p>
                    <p><strong>Notes:</strong> {{ $record->orderDetail->notes }}</p>
                </div>
            </x-filament::card>
        @endif --}}

    </div>
</x-filament::page>
