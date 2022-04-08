<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use App\Models\User;
use Filament\Resources\Pages\ListRecords;
use Filament\Tables\Actions\BulkAction;
use Illuminate\Database\Eloquent\Collection;

class ListUsers extends ListRecords
{
    protected static string $resource = UserResource::class;

    protected function getTableBulkActions(): array
    {
        return [
            BulkAction::make('block_users')
                ->label('Blokkeer gebruikers')
                ->action(fn (Collection $records) => $records->map(function ($record) {
                    $this->blockUser($record, true);
                }))
                ->requiresConfirmation()
                ->deselectRecordsAfterCompletion()
        ];
    }

    public function blockUser($record, bool $block)
    {
        return User::query()
            ->where('id', $record->id)
            ->update([
                'is_blocked' => $block
            ]);
    }
}
