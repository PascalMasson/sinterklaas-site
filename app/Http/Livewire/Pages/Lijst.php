<?php

namespace App\Http\Livewire\Pages;

use App\Models\Cadeau;
use App\Models\User;
use Auth;
use Livewire\Component;

class Lijst extends Component
{

    public $lijstId;
    public $cadeaus;
    public $listName;
    public $isMyList;

    public function mount($lijstId)
    {
        $this->isMyList = $this->lijstId == Auth::id();
        $this->lijstId = $lijstId;
        $this->cadeaus = Cadeau::where('listId', $this->lijstId)
            ->withCount('images')
            ->with('images')
            ->get();
        $this->listName = User::find($lijstId)->name;
    }

    public function render()
    {
        return view('livewire.pages.lijst');
    }
}
