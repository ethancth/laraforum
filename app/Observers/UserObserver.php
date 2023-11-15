<?php

namespace App\Observers;

use App\Models\User;

class UserObserver
{
    public function saving(User $user)
    {
        if (empty($user->avatar)) {
            $user->avatar = 'https://static.wikia.nocookie.net/gensin-impact/images/5/59/Traveler_Icon.png';
        }
    }
}
