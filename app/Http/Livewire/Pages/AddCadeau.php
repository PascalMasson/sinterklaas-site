<?php

namespace App\Http\Livewire\Pages;

use App\Models\Attachment;
use App\Models\Cadeau;
use Livewire\Component;
use Livewire\WithFileUploads;
use Session;

class AddCadeau extends Component
{
    use WithFileUploads;

    public $title;
    public $description;
    public $prijs = 0;
    public $location;
    public $images;

    protected $rules = [
        'title' => 'required',
        'description' => 'nullable',
        'prijs' => 'required|float',
        'location' => 'nullable',
        'images' => 'nullable',
    ];

    protected $messages = [
        'prijs.float' => 'Het veld prijs moet een geldig bedrag zijn. Exclusief euroteken.',
        'prijs.required' => 'Het veld prijs is vereist, dit mag ook 0 zijn.',
    ];

    public function render()
    {
        return view('livewire.pages.add-cadeau');
    }


    public function saveCadeau()
    {
        $formData = $this->validate();

        $formData['createdBy'] = Session::get('loggedInUser')->id;
        $formData['listId'] = Session::get('loggedInUser')->id;

        $cadeau = Cadeau::create($formData);


        $this->uploadAttachments($formData, 'images', $cadeau->id);


        return redirect(route('lijst', ['lijstId' => $cadeau->listId]));
    }

    private function uploadAttachments($formData, $fieldId, $cadeauId)
    {
        if ($formData[$fieldId] != null) {
            foreach ($formData[$fieldId] as $image) {
                $fileName = time() . '-' . $image->getClientOriginalName();
                $path = $image->storeAs('images', $fileName, 'public');
                $attachment = new Attachment;
                $attachment->url = $path;
                $attachment->uploadedBy = Session::get('loggedInUser')->id;
                $attachment->cadeauId = $cadeauId;
                $attachment->save();
            }
        }
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
}
