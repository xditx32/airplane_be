<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GalleryResource\Pages;
use App\Filament\Resources\GalleryResource\RelationManagers;
use App\Models\Gallery;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables\Columns\{TextColumn, ImageColumn, IconColumn};
use Filament\Forms\Components\{TextInput, FileUpload, Select, Textarea, Repeater};
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GalleryResource extends Resource
{
    protected static ?string $model = Gallery::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Gallery';

    protected static ?string $navigationGroup = 'Gallery';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Select::make('category_gallery_id')
                    ->relationship('CategoryGallery', 'name')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->label('Kategori Galeri'),

                FileUpload::make('photo')
                    ->required()
                    ->image()
                    ->disk('public')
                    ->optimize('webp')
                    ->preserveFilenames()
                    ->directory('assets/images/gallery')
                    ->maxSize(512)
                    ->label('Gambar Galeri'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('CategoryGallery.name')
                    ->searchable()
                    ->label('Kategori Galeri'),

                ImageColumn::make('photo')
                    ->label('gambar Galeri'),

                TextColumn::make('created_at')
                    ->dateTime('d-M-Y H:i:s')
                    ->label('Galeri dibuat'),
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
            'index' => Pages\ListGalleries::route('/'),
            'create' => Pages\CreateGallery::route('/create'),
            'edit' => Pages\EditGallery::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getModelLabel(): string
    {
        return __('Galeri');
    }

    public static function getPluralModelLabel(): string
    {
      return __('Galeri');
    }
}
