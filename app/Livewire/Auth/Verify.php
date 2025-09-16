<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Verify extends Component
{
    public $verificationLinkSent = false;

    public function resendVerification()
    {
        if (Auth::user()) {
            Auth::user()->sendEmailVerificationNotification();
            $this->verificationLinkSent = true;
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.auth.verify');
    }
}
