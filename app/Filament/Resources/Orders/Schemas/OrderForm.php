<?php

namespace App\Filament\Resources\Orders\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Textarea;
use Illuminate\Support\Facades\Storage;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Placeholder;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\ImageEntry;

class OrderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make()
                    ->columns(2)
                    ->schema([
                        Select::make('user_id')
                            ->label('Customer')
                            ->relationship('user', 'name')
                            ->required(),

                        TextInput::make('total_amount')
                            ->label('Total Amount')
                            ->numeric()
                            ->required(),

                        Select::make('status')
                            ->options([
                                'pending' => 'Pending',
                                'delivered' => 'Delivered',
                                'shipped' => 'Shipped',
                                'processing' => 'Processing',
                                'cancelled' => 'Cancelled',
                            ])
                            ->required(),

                        Select::make('payment_status')
                            ->options([
                                'paid' => 'Paid',
                                'unpaid' => 'Unpaid',
                            ])
                            ->required(),

                        Select::make('payment_method')
                            ->options([
                                'cod' => 'Cash on Delivery',
                                'online' => 'Online',
                            ])
                            ->required(),

                        FileUpload::make('transaction_image')
                            ->label('Product Thumbnail')
                            ->image()
                            ->directory('images/orders/transactions')
                            ->disk('public')
                            ->openable()
                            ->downloadable()
                            ->visibility('public')
                            ->deletable(false)
                            // ->deleteUploadedFileUsing(function ($file) {
                            //     Storage::disk('public')->delete($file);
                            // })
                            ->required(),

                    ]),

                Section::make()
                    ->label('Shipping Details')
                    ->columns(2)
                    ->relationship('orderDetail')
                    ->schema([
                        TextInput::make('name')
                            ->label('Recipient Name')
                            ->required(),

                        TextInput::make('phone_number')
                            ->label('Phone Number')
                            ->tel()
                            ->required(),

                        TextInput::make('city')
                            ->label('City')
                            ->required(),

                        Textarea::make('address')
                            ->label('Address')
                            ->required(),
                    ]),

                Section::make()
                    ->label('Order Items')
                    ->disabled()
                    ->schema([
                        Repeater::make('orderItems')
                            ->relationship()
                            ->schema([

                                TextEntry::make('product_image')
                                    ->label('Product Image')
                                    ->state(fn($record) => $record?->product?->image
                                        ? '<img src="' . asset('storage/' . $record->product->image) . '" class="h-26 w-26 object-cover rounded-lg" />'
                                        : 'No image')
                                    ->hiddenLabel()
                                    ->reactive()
                                    ->html()
                                    ->extraAttributes(['class' => 'prose']),

                                Select::make('product_id')
                                    ->relationship('product', 'name')
                                    ->required(),

                                TextInput::make('quantity')
                                    ->numeric()
                                    ->required(),

                                TextInput::make('price')
                                    ->numeric()
                                    ->required(),


                                TextInput::make('subtotal')
                                    ->formatStateUsing(function ($record) {
                                        return $record->quantity * $record->price;
                                    })
                                    ->numeric()
                                    ->required(),
                            ])
                            ->columns(5)
                            ->columnSpanFull()
                            ->addActionLabel('Add Item'),
                    ])
                    ->columnSpanFull(),
            ]);
    }
}
