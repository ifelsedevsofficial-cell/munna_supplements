<?php

namespace App\Filament\Resources\SubCategories\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Facades\Storage;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;

class SubCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Name')
                    ->required()
                    ->maxLength(255),

                FileUpload::make('image')
                    ->label('Category Thumbnail')
                    ->image()
                    ->directory('images/sub_categories')
                    ->disk('public')
                    ->openable()
                    ->downloadable()
                    ->visibility('public')
                    ->deleteUploadedFileUsing(function ($file) {
                        Storage::disk('public')->delete($file);
                    })
                    ->required(),

                Textarea::make('description')
                    ->label('Description')
                    ->placeholder('Optional details about this category')
                    ->nullable(),

                Select::make('category_id')
                    ->relationship('category', 'name')
                    ->searchable()
                    ->required()
                    ->preload(),
            ]);
    }
}
