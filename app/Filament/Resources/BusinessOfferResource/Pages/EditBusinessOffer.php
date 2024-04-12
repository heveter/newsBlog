<?php

namespace App\Filament\Resources\BusinessOfferResource\Pages;

use App\Filament\Resources\BusinessOfferResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBusinessOffer extends EditRecord
{
    protected static string $resource = BusinessOfferResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
