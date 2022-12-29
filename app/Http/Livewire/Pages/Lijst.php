<?php

namespace App\Http\Livewire\Pages;

use App\Models\Cadeau;
use App\Models\User;
use App\Traits\UseLoggedInUser;
use Illuminate\Http\Request;
use Livewire\Component;

class Lijst extends Component
{
    use UseLoggedInUser;

    public $lijstId;
    public $cadeaus;
    public $listName;
    public $isMyList;

    public function mount($lijstId)
    {
        $this->isMyList = $this->lijstId == $this->getLoggedInUserId();
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
