<?php

namespace App\Livewire\Game;

use App\Models\Outpost;
use Livewire\Component;

class ResourceCounter extends Component
{
    public Outpost $outpost;

    public function mount(Outpost $outpost)
    {
        $this->outpost = $outpost;
    }

    public function render()
    {
        return view('livewire.game.resource-counter');
    }
}
