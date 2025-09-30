<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    protected $fillable = [
        'outpost_id',
        'type',
        'level',
    ];

    public function outpost()
    {
        return $this->belongsTo(Outpost::class);
    }

    public function user()
    {
        return $this->hasOneThrough(User::class, Outpost::class);
    }
}
