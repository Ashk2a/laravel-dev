<?php

namespace App\Modules\User\Filament\Resources\Admin\UserResource\Pages;

use App\Modules\User\Filament\Resources\Admin\UserResource;
use Filament\Resources\Pages\CreateRecord;

class CreateUser extends CreateRecord
{
    protected static string $resource = UserResource::class;
}
