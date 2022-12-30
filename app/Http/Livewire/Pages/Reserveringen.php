<?php

namespace App\Http\Livewire\Pages;

use App\Models\Cadeau;
use App\Traits\UseLoggedInUser;
use Livewire\Component;

class Reserveringen extends Component
{
    use UseLoggedInUser;

    public $reserveringen = [];

    public function mount()
    {
        $reserveringenRaw = Cadeau::where(function ($query) {
            $query->where('reservedBy', $this->getLoggedInUserId())
                ->orWhere('reservedBy', $this->getLoggedInUser()->partnerId);
        })
            ->where('listId', '!=', $this->getLoggedInUserId())
            ->withCount('images')
            ->with('images')
            ->with('listOwner')
            ->get();

        foreach ($reserveringenRaw as $reservering) {
            $this->reserveringen[$reservering->listOwner->name][] = $reservering;
        }
    }

    public function render()
    {
        return view('livewire.pages.reserveringen');
    }
}
