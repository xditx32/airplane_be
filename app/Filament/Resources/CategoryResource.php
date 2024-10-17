<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables\Columns\{TextColumn, ImageColumn, IconColumn};
use Filament\Forms\Components\{TextInput, FileUpload, Select, Textarea, Repeater, RichEditor};
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Paket Produk';

    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->helpertext('Gunakan name data dengan tepat.')
                    ->maxLength(255)
                    ->label('Nama Kategori'),
                FileUpload::make('icon')
                    ->image()
                    ->disk('public')
                    ->optimize('webp')
                    ->preserveFilenames()
                    ->directory('assets/frontend/images/category/icon')
                    ->maxSize(512)
                    ->label('Icon Kategori'),
                FileUpload::make('photo')
                    ->image()
                    ->disk('public')
                    ->optimize('webp')
                    ->preserveFilenames()
                    ->directory('assets/frontend/images/category')
                    ->maxSize(512)
                    ->label('Gambar Kategori'),
                RichEditor::make('description')
                    ->toolbarButtons([
                            'attachFiles',
                            'blockquote',
                            'bold',
                            'bulletList',
                            'codeBlock',
                            'h2',
                            'h3',
                            'italic',
                            'link',
                            'orderedList',
                            'redo',
                            'strike',
                            'underline',
                            'undo',
                        ])
                    ->columnSpanFull()
                    ->label('Deskripsi Kategori'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                ->label('Nama Kategori')
                ->searchable(),
                ImageColumn::make('icon')
                ->label('Icon Kategorii'),
                ImageColumn::make('photo')
                ->label('Gambar Kategori'),
                TextColumn::make('slug')
                ->label('URL'),
                TextColumn::make('created_at')->dateTime('d-M-Y H:i:s')
                ->label('kategori dibuat'),

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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getModelLabel(): string
    {
        return __('Categori Paket');
    }

    public static function getPluralModelLabel(): string
    {
      return __('Categori Paket');
    }
}
