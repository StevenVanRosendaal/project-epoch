<?php

namespace App\Observers;

use App\Models\Building;
use App\Models\Outpost;

class OutpostObeserver
{
    /**
     * Handle the user "created" event.
     */
    public function created(Outpost $outpost): void
    {
        Building::create([
            'outpost_id' => $outpost->id,
            'type' => 'sawmill',
            'level' => 1,
        ]);
    }

    /**
     * Handle the user "updated" event.
     */
    public function updated(Outpost $outpost): void
    {
        //
    }

    /**
     * Handle the user "deleted" event.
     */
    public function deleted(Outpost $outpost): void
    {
        //
    }

    /**
     * Handle the user "restored" event.
     */
    public function restored(Outpost $outpost): void
    {
        //
    }

    /**
     * Handle the user "force deleted" event.
     */
    public function forceDeleted(Outpost $outpost): void
    {
        //
    }
}
