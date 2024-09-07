<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PriodeResource\Pages;
use App\Filament\Resources\PriodeResource\RelationManagers;
use App\Models\Priode;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables\Columns\{TextColumn, ImageColumn, IconColumn};
use Filament\Forms\Components\{DatePicker, TextInput, FileUpload, Select, Textarea, Repeater};
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PriodeResource extends Resource
{
    protected static ?string $model = Priode::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    protected static ?string $navigationGroup = 'Product';

     protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                TextInput::make('name')->helpertext('Gunakan name data dengan tepat.')->required()->maxLength(255),
                DatePicker::make('date'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                TextColumn::make('name')->searchable(),

                TextColumn::make('created_at')->dateTime('d-M-Y H:i:s')
                ->label('Created Priode'),
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
            'index' => Pages\ListPriodes::route('/'),
            'create' => Pages\CreatePriode::route('/create'),
            'edit' => Pages\EditPriode::route('/{record}/edit'),
        ];
    }
}
