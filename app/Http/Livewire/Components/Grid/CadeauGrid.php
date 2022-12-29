<?php

namespace App\Http\Livewire\Components\Grid;

use App\Models\Cadeau;
use Livewire\Component;

class CadeauGrid extends Component
{
    public $cadeaus;
    public $isMyList;

    protected $listeners = ['cadeauDeleted' => '$refresh'];

    public function render()
    {
        return view('livewire.components.grid.cadeau-grid');
    }

    public function deleteCadeau($id)
    {
        $cadeau = Cadeau::find($id);
        $cadeau->delete();
        $this->emit('cadeauDeleted');
    }
}
