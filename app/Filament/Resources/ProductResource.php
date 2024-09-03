<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('name')->required()->maxLength(255),

                Forms\Components\FileUpload::make('thumbnail')->image()->required(),

                Forms\Components\Textarea::make('about')->required()->rows(10)->cols(20),

                Forms\Components\Repeater::make('product_photos')->relationship('product_photos')->schema([Forms\Components\FileUpload::make('photo')->required()]),

                Forms\Components\Select::make('category_id')->relationship('category', 'name')->searchable()->preload()->required(),

                Forms\Components\Select::make('priode_id')->relationship('priode', 'name')->searchable()->preload()->required(),

                Forms\Components\Repeater::make('product_benefits')->relationship('product_benefits')->schema([Forms\Components\TextInput::make('name')->required()]),

                Forms\Components\Repeater::make('product_airplanes')->relationship()->schema([
                    Forms\Components\Select::make('airplane_id')->relationship('airplane', 'name')->required(),
                ]),

                Forms\Components\TextInput::make('price')->required()->numeric()->prefix('IDR'),

                Forms\Components\TextInput::make('duration')->required()->numeric()->prefix('Days'),

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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
