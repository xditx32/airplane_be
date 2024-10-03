<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AirlineResource\Pages;
use App\Filament\Resources\AirlineResource\RelationManagers;
use App\Models\Airline;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables\Columns\{TextColumn, ImageColumn, IconColumn};
use Filament\Forms\Components\{TextInput, FileUpload, Select, Textarea, Repeater};
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AirlineResource extends Resource
{
    protected static ?string $model = Airline::class;

    protected static ?string $navigationIcon = 'heroicon-o-flag';

    protected static ?string $navigationGroup = 'Paket Produk';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->helpertext('Gunakan name data dengan tepat.')
                    ->required()
                    ->maxLength(255)
                    ->label('Nama Maskapai'),
                FileUpload::make('icon')
                    ->image()
                    ->disk('public')
                    ->optimize('webp')
                    ->preserveFilenames()
                    ->directory('assets/frontend/images/airline/icon')
                    ->maxSize(512)
                    ->label('Icon Maskapai'),
                FileUpload::make('photo')
                    ->image()
                    ->required()
                    ->disk('public')
                    ->optimize('webp')
                    ->preserveFilenames()
                    ->directory('assets/frontend/images/airline')
                    ->maxSize(512)
                    ->label('Gambar Maskapai'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nama Maskapai')
                    ->searchable(),
                ImageColumn::make('icon'),
                ImageColumn::make('photo'),
                TextColumn::make('created_at')
                    ->dateTime('d-M-Y H:i:s')
                    ->label('Maskapai dibuat'),
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
            'index' => Pages\ListAirlines::route('/'),
            'create' => Pages\CreateAirline::route('/create'),
            'edit' => Pages\EditAirline::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getModelLabel(): string
    {
        return __('Maskapai');
    }

    public static function getPluralModelLabel(): string
    {
      return __('Maskapai');
    }
}
