<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BusinessOfferResource\Pages;
use App\Models\Business_offer;
use App\Models\Business_offer_categoties;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use App\Models\Business_offer_categories;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BusinessOfferResource extends Resource
{
    protected static ?string $model = Business_offer::class;

    protected static ?string $navigationIcon = 'heroicon-o-banknotes';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('short_description')
                    ->required()
                    ->label('Short description')
                    ->columnSpanFull(),
                Forms\Components\Select::make('business_offer_categories_id')
                    ->label('Categories')
                    ->options(Business_offer_categories::all()->pluck('name', 'id'))
                    ->searchable(),
                Forms\Components\FileUpload::make('images')
                    ->multiple()
                    ->imageEditor()
                    ->image(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('category.name'),
                Tables\Columns\TextColumn::make('short_description')
                    ->limit(30)
                    ->searchable(),
                Tables\Columns\ImageColumn::make('images')
                    ->square()
                    ->stacked()
                    ->limit(3)
                    ->limitedRemainingText(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])

            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
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
            'index' => Pages\ListBusinessOffers::route('/'),
            'create' => Pages\CreateBusinessOffer::route('/create'),
            'view' => Pages\ViewBusinessOffer::route('/{record}'),
            'edit' => Pages\EditBusinessOffer::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
