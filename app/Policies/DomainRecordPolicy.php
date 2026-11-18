<?php

namespace App\Policies;

use App\Models\DomainRecord;
use App\Models\User;

class DomainRecordPolicy
{
    public function view(User $user, DomainRecord $record): bool
    {
        return $user->isAdmin() || $record->user_id === $user->id;
    }

    public function update(User $user, DomainRecord $record): bool
    {
        return $user->isAdmin() || $record->user_id === $user->id;
    }

    public function delete(User $user, DomainRecord $record): bool
    {
        return $user->isAdmin() || $record->user_id === $user->id;
    }
}
