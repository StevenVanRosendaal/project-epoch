<?php

namespace App\Livewire\Game;

use Livewire\Component;

class BuildingCard extends Component
{
    public $building;
    public $imgClass;

    public function render()
    {
        return view('livewire.game.building-card');
    }
}
