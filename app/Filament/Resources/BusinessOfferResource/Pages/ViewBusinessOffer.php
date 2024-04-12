<?php

namespace App\Filament\Resources\BusinessOfferResource\Pages;

use App\Filament\Resources\BusinessOfferResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewBusinessOffer extends ViewRecord
{
    protected static string $resource = BusinessOfferResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
