<?php

namespace App\Filament\Resources\CategorySliderResource\Pages;

use App\Filament\Resources\CategorySliderResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCategorySlider extends EditRecord
{
    protected static string $resource = CategorySliderResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
