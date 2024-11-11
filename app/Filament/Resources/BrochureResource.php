<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BrochureResource\Pages;
use App\Filament\Resources\BrochureResource\RelationManagers;
use App\Models\Brochure;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables\Columns\{TextColumn, ImageColumn, IconColumn};
use Filament\Forms\Components\{TextInput, FileUpload, Select, Textarea, Repeater};
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BrochureResource extends Resource
{
    protected static ?string $model = Brochure::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                TextInput::make('name')
                    ->helpertext('Gunakan name data dengan tepat.')
                    ->required()
                    ->maxLength(255)
                    ->label('Nama Brosur'),
                FileUpload::make('photo')
                    ->image()
                    ->required()
                    ->disk('public')
                    ->optimize('webp')
                    ->preserveFilenames()
                    ->directory('assets/images/brosur')
                    ->label('Gambar Brosur'),
                Select::make('is_active')
                    ->options([
                        TRUE => 'Active',
                        FALSE => 'Not Active',
                    ])
                    ->label('Status Brosur')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nama Brosur')
                    ->searchable(),
                ImageColumn::make('photo')
                    ->label('Gambar Brosur'),
                IconColumn::make('is_active')
                    ->boolean()
                    ->falseColor('danger')
                    ->trueColor('success')
                    ->falseIcon('heroicon-o-x-circle')
                    ->trueIcon('heroicon-o-check-circle')
                    ->label('Status Brosur')
                    ->sortable(),
                TextColumn::make('created_at')
                    ->dateTime('d-M-Y H:i:s')
                    ->label('Brosur dibuat'),
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
            'index' => Pages\ListBrochures::route('/'),
            'create' => Pages\CreateBrochure::route('/create'),
            'edit' => Pages\EditBrochure::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getModelLabel(): string
    {
        return __('Brosur');
    }

    public static function getPluralModelLabel(): string
    {
      return __('Brosur');
    }
}
