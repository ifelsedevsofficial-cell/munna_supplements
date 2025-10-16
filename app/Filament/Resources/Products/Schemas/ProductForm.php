<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Storage;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Product Name')
                    ->required()
                    ->maxLength(255),

                // Select::make('category_id')
                //     ->label('Category')
                //     ->relationship('category', 'name')
                //     ->searchable()
                //     ->preload()
                //     ->required(),

                Select::make('sub_category_id')
                    ->label('Sub Category')
                    ->relationship('subCategory', 'name') // relationship is still needed
                    ->getOptionLabelFromRecordUsing(fn($record) => $record->category_sub_category_name)
                    ->searchable()
                    ->preload()
                    ->required(),

                Textarea::make('description')
                    ->label('Description')
                    ->rows(4)
                    ->required(),

                TextInput::make('original_price')
                    // ->label('Price')
                    ->numeric()
                    ->rules(['decimal:0,2'])
                    ->required(),

                TextInput::make('discounted_price')
                    // ->label('Price')
                    ->numeric()
                    ->rules(['decimal:0,2'])
                    ->required(),


                TextInput::make('stock')
                    ->label('Stock')
                    ->numeric()
                    ->rules(['decimal:0,2'])
                    ->required(),

                FileUpload::make('image')
                    ->label('Product Thumbnail')
                    ->image()
                    ->directory('images/products')
                    ->disk('public')
                    ->openable()
                    ->downloadable()
                    ->visibility('public')
                    ->deleteUploadedFileUsing(function ($file) {
                        Storage::disk('public')->delete($file);
                    })
                    ->required(),


                FileUpload::make('images')
                    ->label('Product Images')
                    ->image()
                    ->multiple()
                    ->reorderable()
                    ->directory('images/products/images')
                    ->disk('public')
                    ->visibility('public')
                    ->deleteUploadedFileUsing(function ($file) {
                        Storage::disk('public')->delete($file);
                    })
                    ->nullable()
                    ->maxFiles(3),
            ]);
    }
}
