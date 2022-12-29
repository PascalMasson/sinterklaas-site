<?php

namespace App\Http\Livewire\Pages;

use App\Models\User;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Login extends Component
{
    public $name = '';

    public function login()
    {
        $data = $this->validate([
            'name' => 'required|exists:users,name'
        ]);

        $user = User::where('name', $data['name'])->first();
        if ($user) {
            Session::put('loggedInUser', $user);
            return redirect(route('lijst', $user->id));
        }

        return back()->withErrors([
            'name' => 'De opgegeven naam is onbekend'
        ])->onlyInput('name');
    }

    public function mount()
    {
        if (Session::has('loggedInUser')) {
            return redirect(route('lijst', Session::get('loggedInUser')->id));
        }
    }

    public function render()
    {
        return view('livewire.pages.login');
    }
}
