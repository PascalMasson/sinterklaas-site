<?php

namespace App\Http\Livewire\Pages;

use App\Models\Fopper;
use App\Models\User;
use App\Traits\UseLoggedInUser;
use Livewire\Component;

class EditFopper extends Component
{
    use UseLoggedInUser;

    public $fopper;
    public $users;

    protected $rules = [
        'fopper.fopperVoor' => 'required',
        'fopper.description' => 'required',
    ];

    public function mount($id)
    {
        $this->users = User::where('id', '!=', $this->getLoggedInUserId())->orderBy('name')->get();

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
