<?php

namespace App\Modules\User\Filament\Resources\Admin\UserResource\RelationManagers;

use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\Relation;
use Modules\Common\Enums\Optins;
use Modules\Common\Models\Optin;

class OptinsRelationManager extends RelationManager
{
    protected static string $relationship = 'optins';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('field.optin'))
                    ->getStateUsing(fn (Optin $record): ?string => $record->name->getTranslation()),
                Tables\Columns\BooleanColumn::make('value')
                    ->label(__('field.accepted'))
                    ->action(function (Optin $record, Tables\Columns\BooleanColumn $column) {
                        if (Optins::Tou !== $record->name) {
                            $record->update([
                                'value' => !$column->getState(),
                            ]);
                        }
                    }),
            ]);
    }

    public function getRelationship(): Relation | Builder
    {
        return parent::getRelationship()->orderBy('id');
    }
}
