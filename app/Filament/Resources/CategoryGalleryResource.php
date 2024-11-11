<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryGalleryResource\Pages;
use App\Filament\Resources\CategoryGalleryResource\RelationManagers;
use App\Models\CategoryGallery;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables\Columns\{TextColumn, ImageColumn, IconColumn};
use Filament\Forms\Components\{TextInput, FileUpload, Select, Textarea, Repeater};
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CategoryGalleryResource extends Resource
{
    protected static ?string $model = CategoryGallery::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Category Gallery';

    protected static ?string $navigationGroup = 'Gallery';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->helpertext('Gunakan name data dengan tepat.')
                    ->required()
                    ->maxLength(255),
                FileUpload::make('icon')
                    ->image()
                    ->disk('public')
                    ->optimize('webp')
                    ->preserveFilenames()
                    ->directory('assets/images/gallery/category')
                    ->label('Icon Kategori'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nama Kategori Galleri')
                    ->searchable(),
                ImageColumn::make('icon')
                    ->label('Icon Kategori'),
                TextColumn::make('created_at')
                    ->dateTime('d-M-Y H:i:s')
                    ->label('Kategori Galeri dibuat'),
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
            'index' => Pages\ListCategoryGalleries::route('/'),
            'create' => Pages\CreateCategoryGallery::route('/create'),
            'edit' => Pages\EditCategoryGallery::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getModelLabel(): string
    {
        return __('Kategori Galeri');
    }

    public static function getPluralModelLabel(): string
    {
      return __('Kategori Galeri');
    }
}
