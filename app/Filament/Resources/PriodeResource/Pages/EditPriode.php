<?php

namespace App\Filament\Resources\PriodeResource\Pages;

use App\Filament\Resources\PriodeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPriode extends EditRecord
{
    protected static string $resource = PriodeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
