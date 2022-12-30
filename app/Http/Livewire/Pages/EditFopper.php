<?php

namespace App\Http\Livewire\Pages;

use App\Models\Fopper;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EditFopper extends Component
{

    public $fopper;
    public $users;

    protected $rules = [
        'fopper.fopperVoor' => 'required',
        'fopper.description' => 'required',
    ];

    public function mount($id)
    {
        $this->users = User::where('id', '!=', Auth::id())->orderBy('name')->get();

        $this->fopper = Fopper::find($id);
    }

    public function render()
    {
        return view('livewire.pages.edit-fopper');
    }

    public function saveFopper()
    {
        $data = $this->validate();

        $this->fopper->save();

        return $this->redirect(route('foppers'));
    }
}
