<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables\Columns\{TextColumn, ImageColumn, IconColumn};
use Filament\Forms\Components\{TextInput, FileUpload, Select, Textarea, Repeater};
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Carbon\Carbon;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rocket-launch';

    protected static ?string $navigationGroup = 'Product';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),

                FileUpload::make('thumbnail')
                    ->required()
                    ->image()
                    ->disk('public')
                    ->optimize('webp')
                    ->preserveFilenames()
                    ->directory('assets/frontend/images/product/thumbnail')
                    ->maxSize(512)
                    ->label('Thumbnail'),

                Select::make('category_id')
                    ->relationship('category', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

                Select::make('priode_id')
                    ->relationship('priode', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),

                Textarea::make('detail')->required()
                    ->rows(10)
                    ->cols(20),

                Repeater::make('ProductPhotos')
                    ->relationship('ProductPhotos')
                    ->schema([
                        FileUpload::make('photo')
                        ->required()
                        ->image()
                        ->disk('public')
                        ->optimize('webp')
                        ->preserveFilenames()
                        ->directory('assets/frontend/images/product')
                        ->maxSize(512)
                        ]

                )->label('Gambar Produk'),

                Repeater::make('ProductBenefits')
                    ->relationship('ProductBenefits')
                    ->schema([
                            TextInput::make('name')
                            ->required()
                        ]
                ),

                Repeater::make('ProductHotels')
                    ->relationship('ProductHotels')
                    ->schema([
                        TextInput::make('name')
                        ->required()
                    ]
                ),

                Repeater::make('ProductAirlines')
                    ->relationship()
                    ->schema([
                        Select::make('airline_id')
                    ->relationship('airline', 'name')
                    ->required()
                    ]
                ),

                TextInput::make('duration')
                    ->required()
                    ->numeric()
                    ->prefix('Days'),

                TextInput::make('seat_available')
                    ->required()
                    ->numeric()
                    ->prefix(''),

                TextInput::make('price')
                    ->required()
                    ->numeric()
                    ->prefix('IDR')
                    ->maxValue(42949672.95),

                Select::make('is_open')
                    ->options([
                        true => 'Open',
                        false => 'Not Open',
                    ])
                    ->required(),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //

                TextColumn::make('name')
                    ->searchable(),

                ImageColumn::make('thumbnail'),

                TextColumn::make('category.name'),

                TextColumn::make('price')
                    ->money('IDR')
                    ->sortable(),

                IconColumn::make('is_open')
                    ->boolean()
                    ->falseColor('danger')
                    ->trueColor('success')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueIcon('heroicon-o-check-circle')
                    ->label('Visibility')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->dateTime('d-M-Y H:i:s')
                    ->label('Created Product'),

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

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
