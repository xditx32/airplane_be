<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogScrapResource\Pages;
use App\Filament\Resources\BlogScrapResource\RelationManagers;
use App\Models\BlogScrap;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables\Columns\{TextColumn, ImageColumn, IconColumn};
use Filament\Forms\Components\{TextInput, FileUpload, Select, Textarea, Repeater};
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Section;

class BlogScrapResource extends Resource
{
    protected static ?string $model = BlogScrap::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title'),
                TextArea::make('detail')
                    ->columnSpanFull(),
                FileUpload::make('photo')
                    ->image()
                    ->disk('public')
                    ->optimize('webp')
                    ->preserveFilenames()
                    ->directory('assets/frontend/images/blogscrap')
                    ->label('Photo Blog'),
                TextInput::make('url'),
            ]);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->searchable(),
                ImageColumn::make('photo'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBlogScraps::route('/'),
            'create' => Pages\CreateBlogScrap::route('/create'),
            'edit' => Pages\EditBlogScrap::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
