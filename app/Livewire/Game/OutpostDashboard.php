<?php

namespace App\Livewire\Game;

use Livewire\Component;
use App\Services\ResourceService;
use Illuminate\Support\Facades\Auth;

class OutpostDashboard extends Component
{
    public $outpost;

    public function mount(ResourceService $resources)
    {
        // Lazy update the resources of the user's selected outpost
        $this->outpost = $resources->applyResources(Auth::user()->selectedOutpost);
    }

    public function render()
    {
        return view('livewire.game.outpost-dashboard', [
            'outpost' => $this->outpost,
        ]);
    }
}
