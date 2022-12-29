<?php

namespace App\Http\Livewire\Pages;

use App\Models\Cadeau;
use App\Models\Fopper;
use Livewire\Component;
use Livewire\WithFileUploads;

class Admin extends Component
{
    use WithFileUploads;

    public $databaseJson;

    public function render()
    {
        return view('livewire.pages.admin');
    }

    public function saveDatabaseJson()
    {
        $data = $this->validate([
            'databaseJson' => 'required|file|mimes:json'
        ]);

        $filecontents = file_get_contents($data['databaseJson']->getRealPath());
        $all_data = json_decode($filecontents);
        //filter all data where type is table
        $tablesdata = array_filter($all_data, function ($item) {
            return $item->type == 'table' && $item->name != 'gebruikers';
        });
        $tables = [];
        foreach ($tablesdata as $tabledata) {
            $tables[$tabledata->name] = $tabledata->data;
        }

        \DB::table('foppers')->truncate();
        foreach ($tables['foppertjes'] as $old) {
            $new = new Fopper();
            $new->description = $old->Text;
            $new->fopperVan = $old->VanId;
            $new->fopperVoor = $old->VoorId;
            $new->save();
        }
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('cadeaus')->truncate();
        \DB::table('attachments')->truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        foreach ($tables['kadootjes'] as $old) {
            $new = new Cadeau();
            $new->title = $old->Kado;
            if (filter_var($old->Omschrijving, FILTER_VALIDATE_URL)) {
                $new->location = $old->Omschrijving;
            } else {
                $new->description = $old->Omschrijving;
            }
            $new->status = $old->Status;
            $new->createdBy = $old->VoegToeId;
            $new->listId = $old->LijstId;
            if ($old->Status != 'VRIJ') {
                $new->reservedBy = $old->WijzigId;
            }
            $new->save();
        }

        return redirect(route('admin.index'));
    }
}
