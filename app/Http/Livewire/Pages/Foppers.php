<?php

namespace App\Http\Livewire\Pages;

use App\Models\Fopper;
use Livewire\Component;

class Foppers extends Component
{

    public $foppers;

    public function mount()
    {
        $this->foppers = auth()->user()->foppers()->orderBy('fopperVoor', 'asc')->get();
    }

    public function render()
    {
        return view('livewire.pages.foppers');
    }

    public function deleteFopper($id)
    {
        $fopper = Fopper::find($id);
        $fopper->delete();
        $this->foppers = auth()->user()->foppers()->orderBy('fopperVoor', 'asc')->get();
    }
}
