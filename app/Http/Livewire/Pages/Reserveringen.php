<?php

namespace App\Http\Livewire\Pages;

use App\Models\Cadeau;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Reserveringen extends Component
{

    public $reserveringen = [];

    public function mount()
    {
        $reserveringenRaw = Cadeau::where(function ($query) {
            $query->where('reservedBy', Auth::id())
                ->orWhere('reservedBy', Auth::user()->partnerId);
        })
            ->where('listId', '!=', Auth::id())
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
