<?php

namespace App\Filament\Resources\CategoryGalleryResource\Pages;

use App\Filament\Resources\CategoryGalleryResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCategoryGalleries extends ListRecords
{
    protected static string $resource = CategoryGalleryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
