<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rocket-launch';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('name')->required()->maxLength(255),

                Forms\Components\FileUpload::make('thumbnail')->image()->required(),

                Forms\Components\Select::make('category_id')->relationship('category', 'name')->searchable()->preload()->required(),

                Forms\Components\Select::make('priode_id')->relationship('priode', 'name')->searchable()->preload()->required(),

                Forms\Components\Textarea::make('about')->required()->rows(10)->cols(20),

                Forms\Components\Repeater::make('ProductPhotos')->relationship('ProductPhotos')->schema([Forms\Components\FileUpload::make('photo')->required()]),

                Forms\Components\Repeater::make('ProductBenefits')->relationship('ProductBenefits')->schema([Forms\Components\TextInput::make('name')->required()]),

                Forms\Components\Repeater::make('ProductHotels')->relationship('ProductHotels')->schema([Forms\Components\TextInput::make('name')->required()]),

                Forms\Components\Repeater::make('ProductAirlines')->relationship()
                ->schema([Forms\Components\Select::make('airline_id')
                ->relationship('airline', 'name')
                ->required(),
                ]),

                Forms\Components\TextInput::make('duration')->required()->numeric()->prefix('Days'),

                Forms\Components\TextInput::make('price')->required()->numeric()->prefix('IDR'),

                Forms\Components\Select::make('is_open')->options([
                    true => 'Open',
                    false => 'Not Open',
                ])->required(),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('name')->searchable(),

                Tables\Columns\ImageColumn::make('thumbnail'),

                Tables\Columns\TextColumn::make('category.name'),
            ])
            ->filters([
                //
                SelectFilter::make('category_id')->label('Category')->relationship('category', 'name')
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
