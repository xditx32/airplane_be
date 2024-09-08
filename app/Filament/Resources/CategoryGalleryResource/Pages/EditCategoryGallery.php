<?php

namespace App\Filament\Resources\CategoryGalleryResource\Pages;

use App\Filament\Resources\CategoryGalleryResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCategoryGallery extends EditRecord
{
    protected static string $resource = CategoryGalleryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
