<?php

namespace App\Observers;

use App\Models\Outpost;
use App\Models\User;
use App\Models\UserSetting;

class UserObserver
{
    /**
     * Handle the user "created" event.
     */
    public function created(User $user): void
    {
        $outpost = Outpost::create([
            'user_id' => $user->id,
            'name' => 'Main Outpost',
            'wood' => config('game.starting_wood'),
            'stone' => config('game.starting_stone'),
            'gold' => config('game.starting_gold'),
            'last_tick' => now(),
        ]);

        UserSetting::create([
            'user_id' => $user->id,
            'selected_outpost' => $outpost->id,
        ]);
    }

    /**
     * Handle the user "updated" event.
     */
    public function updated(User $user): void
    {
        //
    }

    /**
     * Handle the user "deleted" event.
     */
    public function deleted(User $user): void
    {
        //
    }

    /**
     * Handle the user "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the user "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }
}
