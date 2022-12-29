<?php

namespace App\Http\Livewire\Pages;

use App\Models\Fopper;
use App\Models\User;
use App\Traits\UseLoggedInUser;
use Livewire\Component;

class AddFopper extends Component
{
    use UseLoggedInUser;

    public $users;
    public $newFopper;

    protected $rules = [
        'newFopper.fopperVoor' => 'required',
        'newFopper.description' => 'required',
    ];

    public function mount()
    {
        $this->users = User::where('id', '!=', $this->getLoggedInUserId())->orderBy('name')->get();
        $this->newFopper = new Fopper();
        $this->newFopper->fopperVoor = $this->users[0]->id;
    }

    public function render()
    {
        return view('livewire.pages.add-fopper');
    }

    public function saveFopper(){
        $data = $this->validate();

        $this->newFopper->fopperVan = $this->getLoggedInUserId();
        $this->newFopper->save();

        return $this->redirect(route('foppers'));
    }
}
