<?php

namespace App\Http\Livewire\Partials;

use App\Models\User;
use App\Traits\UseLoggedInUser;
use Livewire\Component;

class Nav extends Component
{
    use UseLoggedInUser;

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
