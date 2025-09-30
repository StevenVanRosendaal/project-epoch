<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Outpost extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'wood',
        'stone',
        'gold',
        'last_tick',
    ];

    protected $casts = [
        'last_tick' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function buildings()
    {
        return $this->hasMany(Building::class);
    }

    /**
     * Magic method to get specific building types dynamically
     * Usage: $outpost->sawmill(), $outpost->quarry(), etc.
     */
    public function __call($method, $parameters)
    {
        // Check if the method matches a building type pattern
        $buildingTypes = ['sawmill', 'quarry', 'goldmine', 'lumber_camp', 'mining_camp', 'treasury'];

        if (in_array($method, $buildingTypes)) {
            return $this->buildings()->where('type', $method)->first();
        }

        // Fall back to parent method if not a building type
        return parent::__call($method, $parameters);
    }

    /**
     * Get a specific building by type
     */
    public function getBuilding($type)
    {
        return $this->buildings()->where('type', $type)->first();
    }

    /**
     * Get building level for a specific type
     */
    public function getBuildingLevel($type)
    {
        $building = $this->getBuilding($type);
        return $building ? $building->level : 0;
    }
}
