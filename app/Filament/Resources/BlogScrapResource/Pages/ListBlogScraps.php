<?php

namespace App\Filament\Resources\BlogScrapResource\Pages;

use App\Filament\Resources\BlogScrapResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBlogScraps extends ListRecords
{
    protected static string $resource = BlogScrapResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
