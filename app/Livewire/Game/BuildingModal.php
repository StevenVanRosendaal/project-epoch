<?php

namespace App\Livewire\Game;

use Livewire\Component;

class BuildingModal extends Component
{
    public $building;

    public function render()
    {
        return view('livewire.game.building-modal');
    }
}
