<?php

namespace App\Modules\User\Filament\Resources;

use App\Models\User;
use App\Modules\User\Filament\Resources\UserResource\Pages\CreateUser;
use App\Modules\User\Filament\Resources\UserResource\Pages\EditUser;
use App\Modules\User\Filament\Resources\UserResource\Pages\ListUsers;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $recordTitleAttribute = 'email';

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('id'),
            Tables\Columns\TextColumn::make('name'),
            Tables\Columns\TextColumn::make('email'),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListUsers::route('/'),
            'create' => CreateUser::route('/create'),
            'edit' => EditUser::route('/{record}/edit'),
        ];
    }
}
