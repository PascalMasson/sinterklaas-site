<?php

namespace App\Http\Livewire\Pages;

use App\Models\Fopper;
use App\Traits\UseLoggedInUser;
use Livewire\Component;

class Foppers extends Component
{
    use UseLoggedInUser;

    public $foppers;

    public function mount()
    {
        $this->foppers = $this->getLoggedInUser()->foppers()->orderBy('fopperVoor', 'asc')->get();
    }

    public function render()
    {
        return view('livewire.pages.foppers');
    }

    public function deleteFopper($id)
    {
        $fopper = Fopper::find($id);
        $fopper->delete();
        $this->foppers = $this->getLoggedInUser()->foppers()->orderBy('fopperVoor', 'asc')->get();
    }
}
