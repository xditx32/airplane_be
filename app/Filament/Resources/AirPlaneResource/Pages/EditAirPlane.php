<?php

namespace App\Filament\Resources\AirPlaneResource\Pages;

use App\Filament\Resources\AirPlaneResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAirPlane extends EditRecord
{
    protected static string $resource = AirPlaneResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
