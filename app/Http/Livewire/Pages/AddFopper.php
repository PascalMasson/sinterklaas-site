<?php

namespace App\Http\Livewire\Pages;

use App\Models\Fopper;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddFopper extends Component
{

    public $users;
    public $newFopper;

    protected $rules = [
        'newFopper.fopperVoor' => 'required',
        'newFopper.description' => 'required',
    ];

    public function mount()
    {
        $this->users = User::where('id', '!=', Auth::id())->orderBy('name')->get();
        $this->newFopper = new Fopper();
        $this->newFopper->fopperVoor = $this->users[0]->id;
    }

    public function render()
    {
        return view('livewire.pages.add-fopper');
    }

    public function saveFopper()
    {
        $data = $this->validate();

        $this->newFopper->fopperVan = Auth::id();
        $this->newFopper->save();

        return $this->redirect(route('foppers'));
    }
}
