<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PriodeResource\Pages;
use App\Filament\Resources\PriodeResource\RelationManagers;
use App\Models\Priode;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PriodeResource extends Resource
{
    protected static ?string $model = Priode::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-days';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('name')->helpertext('Gunakan name data dengan tepat.')->required()->maxLength(255),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('name')->searchable(),
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
