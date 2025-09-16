<?php

namespace App\Services;

use App\Models\Outpost;

class ResourceService
{
    public function calculateResources(Outpost $outpost): array
    {
        $lasttick = $outpost->last_tick ?? now();
        $now = now();
        $elapsedSeconds = $lasttick->diffInSeconds($now);

        $productionRates = $this->getProductionRates($outpost);

        $woodGained = $productionRates['wood'] * ($elapsedSeconds / 3600);
        $stoneGained = $productionRates['stone'] * ($elapsedSeconds / 3600);
        $goldGained = $productionRates['gold'] * ($elapsedSeconds / 3600);

        $capacity = $this->getStorageCapacity($outpost);

        return [
            'wood' => min($outpost->wood + $woodGained, $capacity['wood']),
            'stone' => min($outpost->stone + $stoneGained, $capacity['stone']),
            'gold' => min($outpost->gold + $goldGained, $capacity['gold']),
            'last_tick' => $now,
        ];
    }

    public function getProductionRates(Outpost $outpost): array
    {
        return [
            'wood' => config('buildings.sawmill.production.wood'),
            'stone' => config('buildings.quarry.production.stone'),
            'gold' => config('buildings.goldmine.production.gold'),
        ];
    }

    public function getStorageCapacity(Outpost $outpost): array
    {
        return [
            'wood' => config('buildings.lumber_camp.effect.wood_limit'),
            'stone' => config('buildings.mining_camp.effect.stone_limit'),
            'gold' => config('buildings.treasury.effect.gold_limit'),
        ];
    }

    public function applyResources(Outpost $outpost): Outpost
    {
        $newResources = $this->calculateResources($outpost);

        $outpost->update($newResources);

        return $outpost->fresh();
    }
}
