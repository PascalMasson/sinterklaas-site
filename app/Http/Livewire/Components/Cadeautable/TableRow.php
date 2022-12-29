<?php

namespace App\Http\Livewire\Components\Cadeautable;

use Livewire\Component;

class TableRow extends Component
{
    public $cadeau;
    public $isMyList;
    public $isStriped;

    public function render()
    {
        return view('livewire.components.cadeautable.table-row', [
            'cadeau' => $this->cadeau,
            'isMyList' => $this->isMyList,
        ]);
    }

    public function deleteCadeau()
    {
        $this->cadeau->delete();
        $this->emit('cadeauDeleted', $this->cadeau);
    }
}
