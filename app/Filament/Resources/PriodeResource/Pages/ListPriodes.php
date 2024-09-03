<?php

namespace App\Filament\Resources\PriodeResource\Pages;

use App\Filament\Resources\PriodeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPriodes extends ListRecords
{
    protected static string $resource = PriodeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
