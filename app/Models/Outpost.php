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
}
