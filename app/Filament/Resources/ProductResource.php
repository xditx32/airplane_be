<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables\Columns\{TextColumn, ImageColumn, IconColumn};
use Filament\Forms\Components\{RichEditor, DatePicker, TextInput, FileUpload, Group, Select, Textarea, Repeater};
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Section;

use Carbon\Carbon;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rocket-launch';

    protected static ?string $navigationGroup = 'Paket Produk';

    protected static ?int $navigationSort = 4;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make("")
                ->description('')
                ->schema([
                    TextInput::make('name')
                        ->required()
                        ->maxLength(255),
                    Select::make('category_id')
                        ->relationship('category', 'name')
                        ->searchable()
                        ->preload()
                        ->required(),
                    TextInput::make('title')
                        ->required()
                        ->maxLength(255),
                    Repeater::make('ProductTags')
                        ->relationship('ProductTags')
                        ->schema([
                                TextInput::make('name')
                                ->required()
                            ]
                    ),
                    TextArea::make('description')
                        ->required()
                        ->columnSpanFull(),
                    FileUpload::make('photo')
                        ->required()
                        ->image()
                        ->disk('public')
                        ->optimize('webp')
                        ->preserveFilenames()
                        ->directory('assets/frontend/images/product/photo')
                        ->maxSize(512)
                        ->label('Gambar'),
                    FileUpload::make('brochure')
                        ->required()
                        ->image()
                        ->disk('public')
                        ->optimize('webp')
                        ->preserveFilenames()
                        ->directory('assets/frontend/images/product/brochure')
                        ->maxSize(512)
                        ->label('Brosur'),
                    RichEditor::make('detail')
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
                        ->required()
                        ->columnSpanFull(),
                ])->columns(2),
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
                Repeater::make('ProductHoteles')
                    ->relationship()
                    ->schema([
                        Select::make('hotel_id')
                    ->relationship('hotel', 'name')
                    ->required()
                    ]
                )->label('Hotel'),
                Repeater::make('ProductAirlines')
                    ->relationship()
                    ->schema([
                        Select::make('airline_id')
                    ->relationship('airline', 'name')
                    ->required()
                    ]
                )->label('Maskapai'),
                Section::make("")
                ->schema([
                    DatePicker::make('start_priode')
                        ->required(),
                    DatePicker::make('end_priode')
                        ->required(),
                    TextInput::make('duration')
                        ->required()
                        ->numeric()
                        ->prefix('Days'),
                    TextInput::make('seat_available')
                        ->required()
                        ->numeric()
                        ->prefix('Set'),
                    TextInput::make('price_start_from')
                        ->required()
                        ->numeric()
                        ->prefix('')
                        ->label('Harga mulai dari'),
                    Repeater::make('ProductPrices')
                        ->relationship('ProductPrices')
                        ->schema([
                            TextInput::make('price_type')
                            ->required(),
                            TextInput::make('price_tier')
                            ->required()
                        ]
                    ),
                ])->columns(2),
                // TextInput::make('price')
                //     ->required()
                //     ->numeric()
                //     ->prefix('IDR')
                //     ->maxValue(42949672.95),
                Select::make('is_currency')
                    ->options([
                        'RP' => 'Rp',
                        'USD' => 'USD',
                    ])
                    ->required(),
                Select::make('is_promo')
                    ->options([
                        true => 'Yes',
                        false => 'No',
                    ])
                    ->required(),
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
                TextColumn::make('name')
                    ->searchable(),
                ImageColumn::make('thumbnail'),
                TextColumn::make('category.name'),
                TextColumn::make('price_start_from')
                    // ->money('IDR')
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

    public static function getModelLabel(): string
    {
        return __('Paket');
    }

    public static function getPluralModelLabel(): string
    {
      return __('Paket');
    }
}
