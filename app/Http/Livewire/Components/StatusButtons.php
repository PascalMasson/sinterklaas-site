<?php

namespace App\Http\Livewire\Components;

use App\Traits\UseLoggedInUser;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class StatusButtons extends Component
{
    use UseLoggedInUser;

    public $cadeau;
    public $stretch;
    public $buttonClasses = [
        'VRIJ' => [
            'inactive' => 'py-1 px-2 text-sm font-medium text-green-900 bg-transparent rounded-l-lg border border-green-900 hover:bg-green-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-green-500 focus:bg-green-900 focus:text-green',
            'active' => 'py-1 px-2 text-sm font-medium rounded-l-lg border border-green-900 bg-green-900 text-white focus:z-10 focus:ring-2 focus:ring-green-500 focus:bg-green-900 focus:text-green'
        ],
        'GERESERVEERD' => [
            'inactive' => 'py-1 px-2 text-sm font-medium text-yellow-400 bg-transparent border-t border-b border-yellow-900 hover:bg-yellow-400 hover:text-white focus:z-10 focus:ring-2 focus:ring-yellow-500 focus:bg-yellow-400 focus:text-yellow',
            'active' => 'py-1 px-2 text-sm font-medium border-t border-b border-yellow-900 bg-yellow-400 text-white focus:z-10 focus:ring-2 focus:ring-yellow-500 focus:bg-yellow-400 focus:text-yellow'
        ],
        'GEKOCHT' => [
            'inactive' => 'py-1 px-2 text-sm font-medium text-red-800 bg-transparent rounded-r-md border border-red-800 hover:bg-red-800 hover:text-white focus:z-10 focus:ring-2 focus:ring-red-800 focus:bg-red-800 focus:text-red',
            'active' => 'py-1 px-2 text-sm font-medium rounded-r-md border border-red-800 bg-red-800 text-white focus:z-10 focus:ring-2 focus:ring-red-800 focus:bg-red-800 focus:text-red'
        ]
    ];
    public $buttonClasses_mobile = [
        'VRIJ' => [
            'inactive' => 'grow py-1 px-2 text-sm font-medium text-green-900 bg-transparent rounded-l-lg border border-green-900 hover:bg-green-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-green-500 focus:bg-green-900 focus:text-green',
            'active' => 'grow py-1 px-2 text-sm font-medium rounded-l-lg border border-green-900 bg-green-900 text-white focus:z-10 focus:ring-2 focus:ring-green-500 focus:bg-green-900 focus:text-green'
        ],
        'GERESERVEERD' => [
            'inactive' => 'grow py-1 px-2 text-sm font-medium text-yellow-400 bg-transparent border-t border-b border-yellow-900 hover:bg-yellow-400 hover:text-white focus:z-10 focus:ring-2 focus:ring-yellow-500 focus:bg-yellow-400 focus:text-yellow',
            'active' => 'grow py-1 px-2 text-sm font-medium border-t border-b border-yellow-900 bg-yellow-400 text-white focus:z-10 focus:ring-2 focus:ring-yellow-500 focus:bg-yellow-400 focus:text-yellow'
        ],
        'GEKOCHT' => [
            'inactive' => 'grow py-1 px-2 text-sm font-medium text-red-800 bg-transparent rounded-r-md border border-red-800 hover:bg-red-800 hover:text-white focus:z-10 focus:ring-2 focus:ring-red-800 focus:bg-red-800 focus:text-red',
            'active' => 'grow py-1 px-2 text-sm font-medium rounded-r-md border border-red-800 bg-red-800 text-white focus:z-10 focus:ring-2 focus:ring-red-800 focus:bg-red-800 focus:text-red'
        ]
    ];
    protected $listeners = ['refreshCadeau' => '$refresh'];

    public function render()
    {
        return view('livewire.components.status-buttons', [
            'cadeau' => $this->cadeau,
        ]);
    }

    public function updateStatus($status)
    {
        $this->cadeau->status = $status;
        if ($status == "VRIJ") {
            $this->cadeau->reservedBy = null;
        } else {
            $this->cadeau->reservedBy = $this->getLoggedInUserId();
        }
        $this->cadeau->save();
        $this->emit('refreshCadeau');
    }

    public function generateButtonClasses($status)
    {
        if ($this->cadeau->status == $status) {
            return $this->buttonClasses[$status]['active'];
        } else {
            return $this->buttonClasses[$status]['inactive'];
        }
    }

    public function canSetCadeauStatus($cadeau, $status)
    {
        $user = Session::get('loggedInUser');
        if ($status == "VRIJ") {
            return $cadeau->reservedBy == $user->id || $cadeau->reservedBy == $user->partnerId;
        } else {
            return $cadeau->reservedBy == $user->id || $cadeau->reservedBy == $user->partnerId || $cadeau->status == "VRIJ";
        }
    }
}
