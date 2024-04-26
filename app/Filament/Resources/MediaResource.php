<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MediaResource\Pages;
use App\Models\Media;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class MediaResource extends Resource
{
    protected static ?string $model = Media::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('type')
                    ->label('Type')
                    ->options([
                        '1' => 'Фоторепортажи',
                        '2' => 'Видеорепортажи'
                    ])
                    ->searchable(),
                Forms\Components\DatePicker::make('date')
                    ->required(),
                Forms\Components\Textarea::make('short_description')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('full_content')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('source')
                    ->acceptedFileTypes(['video/mp4', 'video/avi', 'video/mov', 'video/wmv', 'video/flv', 'video/mkv', 'video/webm', 'image/gif', 'image/jpeg',
                        'image/pjpeg', 'image/png', 'image/svg+xml', 'image/tiff', 'image/vnd.microsoft.icon', 'image/vnd.wap.wbmp', 'image/webp: WebP'])
                    ->multiple()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\SelectColumn::make('type')
                    ->options([
                        '1' => 'Фоторепортажи',
                        '2' => 'Видеорепортажи'
                    ]),
                Tables\Columns\TextColumn::make('date')
                    ->sortable(),
                Tables\Columns\TextColumn::make('short_description')
                    ->limit(30)
                    ->searchable(),
                Tables\Columns\TextColumn::make('full_content')
                    ->limit(30)
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListMedia::route('/'),
            'create' => Pages\CreateMedia::route('/create'),
            'edit' => Pages\EditMedia::route('/{record}/edit'),
        ];
    }
}
