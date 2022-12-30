<?php

namespace App\Http\Livewire\Partials;

use App\Models\User;
use Livewire\Component;

class Nav extends Component
{

    public $users;

    public function mount()
    {
        $this->users = User::orderBy('name')->get();
    }

    public function render()
    {
        return view('livewire.partials.nav');
    }
}
