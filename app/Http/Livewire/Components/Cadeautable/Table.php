<?php

namespace App\Http\Livewire\Components\Cadeautable;

use App\Models\Cadeau;
use App\Traits\UseLoggedInUser;
use Livewire\Component;

class Table extends Component
{
    use UseLoggedInUser;

    public $isMyList;
    public $cadeaus;

    public $editModal;

    protected $listeners = ['cadeauDeleted' => '$refresh'];

    public function render()
    {
        return view('livewire.components.cadeautable.table');
    }

    public function deleteCadeau($cadeau)
    {
        $cadeau->delete();
        $this->emit('cadeauDeleted');
    }

    public function editCadeau($cadeauId)
    {
        $cadeau = Cadeau::find($cadeauId);
        $this->emit('editCadeau', $cadeau);
    }

}
