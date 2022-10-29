<?php

namespace App\Modules\User\Filament\Resources\Admin\UserResource\Pages;

use App\Modules\User\Filament\Resources\Admin\UserResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
