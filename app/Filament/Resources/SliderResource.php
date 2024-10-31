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
                    ->maxLength(255),

                TextInput::make('sub_title')
                    ->maxLength(255),

                Textarea::make('detail')
                    ->rows(10)
                    ->cols(20),

                Select::make('category_slider_id')
                    ->relationship('CategorySlider', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

                FileUpload::make('photo')
                    ->image()
                    ->disk('public')
                    // ->optimize('webp')
                    ->preserveFilenames()
                    ->directory('assets/frontend/images/slider'),
                    // ->maxSize(8000),
                    // ->maxSize(1024)
                    // ->compress(0.9),

                TextInput::make('button_title')
                    ->maxLength(255),

                TextInput::make('button_link')
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
                    ->label('Kategori Slider'),

                ImageColumn::make('photo')
                    ->label('Gambar Slider'),

                TextColumn::make('created_at')
                    ->dateTime('d-M-Y H:i:s')
                    ->label('Gambar Slider dibuat'),
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

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getModelLabel(): string
    {
        return __('Slider');
    }

    public static function getPluralModelLabel(): string
    {
      return __('Slider');
    }
}
