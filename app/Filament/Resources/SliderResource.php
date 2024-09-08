<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SliderResource\Pages;
use App\Filament\Resources\SliderResource\RelationManagers;
use App\Models\Slider;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables\Columns\{TextColumn, ImageColumn, IconColumn};
use Filament\Forms\Components\{TextInput, FileUpload, Select, Textarea, Repeater};
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SliderResource extends Resource
{
    protected static ?string $model = Slider::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Slider';

    protected static ?string $navigationGroup = 'Slider';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                TextInput::make('title')
                    ->helpertext('Gunakan name data dengan tepat.')
                    ->required()
                    ->maxLength(255),

                TextInput::make('sub_title')
                    ->required()
                    ->maxLength(255),

                Textarea::make('description')
                    ->required()
                    ->rows(10)
                    ->cols(20),

                Select::make('category_slider_id')
                    ->relationship('CategorySlider', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

                FileUpload::make('photo_desktop')
                    ->image(),

                FileUpload::make('photo_mobile')
                    ->image(),

                TextInput::make('button_title')
                    ->required()
                    ->maxLength(255),

                TextInput::make('button_link')
                    ->required()
                    ->maxLength(255),

                Select::make('is_active')
                    ->options([
                        true => 'Active',
                        false => 'Not Active',
                    ])
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('CategorySlider.name')->searchable()
                    ->label('Category Slider'),

                ImageColumn::make('photo_desktop'),

                TextColumn::make('created_at')
                    ->dateTime('d-M-Y H:i:s')
                    ->label('Created Slider'),
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
            'index' => Pages\ListSliders::route('/'),
            'create' => Pages\CreateSlider::route('/create'),
            'edit' => Pages\EditSlider::route('/{record}/edit'),
        ];
    }
}
