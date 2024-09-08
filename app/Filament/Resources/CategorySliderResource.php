<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategorySliderResource\Pages;
use App\Filament\Resources\CategorySliderResource\RelationManagers;
use App\Models\CategorySlider;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables\Columns\{TextColumn, ImageColumn, IconColumn};
use Filament\Forms\Components\{TextInput, FileUpload, Select, Textarea, Repeater};
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CategorySliderResource extends Resource
{
    protected static ?string $model = CategorySlider::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Slider';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                TextInput::make('name')
                    ->helpertext('Gunakan name data dengan tepat.')
                    ->required()
                    ->maxLength(255),

                FileUpload::make('icon')
                    ->image(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('name')
                    ->searchable(),

                ImageColumn::make('icon'),

                TextColumn::make('created_at')
                    ->dateTime('d-M-Y H:i:s')
                    ->label('Created Category Slider'),
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
            'index' => Pages\ListCategorySliders::route('/'),
            'create' => Pages\CreateCategorySlider::route('/create'),
            'edit' => Pages\EditCategorySlider::route('/{record}/edit'),
        ];
    }
}
