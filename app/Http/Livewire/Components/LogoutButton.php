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
        if (Session::has('loggedInUser')) {
            Session::pull('loggedInUser');
        }

        return redirect(route('login'));
    }
}
