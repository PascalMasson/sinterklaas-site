<?php

namespace App\Http\Livewire\Components;

use Illuminate\Support\Facades\Session;
use Livewire\Component;

class LogoutButton extends Component
{
    public function render()
    {
        return view('livewire.components.logout-button');
    }

    public function logout()
    {
        if (auth()->check()) {
            auth()->logout();
            \session()->invalidate();
            \session()->regenerateToken();
        }

        return redirect(route('login'));
    }
}
