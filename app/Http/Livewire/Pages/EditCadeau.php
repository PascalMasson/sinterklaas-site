<?php

namespace App\Http\Livewire\Pages;

use App\Models\Attachment;
use App\Models\Cadeau;
use Livewire\Component;
use Livewire\WithFileUploads;
use Session;

class EditCadeau extends Component
{
    use WithFileUploads;

    public $cadeau;
    public $images;
    public $title;
    public $description;
    public $prijs;
    public $location;

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

    public function mount($id)
    {
        $this->cadeau = Cadeau::find($id);
        $this->title = $this->cadeau->title;
        $this->description = $this->cadeau->description;
        $this->prijs = $this->cadeau->prijs;
        $this->location = $this->cadeau->location;
    }

    public function render()
    {
        return view('livewire.pages.edit-cadeau');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function update()
    {
        $formData = $this->validate();
        $this->cadeau->title = $this->title;
        $this->cadeau->description = $this->description;
        $this->cadeau->prijs = $this->prijs;
        $this->cadeau->location = $this->location;
        $this->cadeau->save();

        $this->uploadAttachments($formData, 'images', $this->cadeau->id);

        return $this->redirect(route('lijst', ['lijstId' => $this->cadeau->listId]));
    }

    private function uploadAttachments($formData, $fieldId, $cadeauId)
    {
        if ($formData[$fieldId] != null) {
            foreach ($formData[$fieldId] as $image) {
                $name = time() . '-' . $image->getClientOriginalName();
                $path = $image->storeAs('images', $name, 'public');
                $attachment = new Attachment;
                $attachment->url = $path;
                $attachment->uploadedBy = Session::get('loggedInUser')->id;
                $attachment->cadeauId = $cadeauId;
                $attachment->save();
            }
        }
    }

    public function deleteAttachment($id)
    {
        $attachment = Attachment::find($id);
        $attachment->delete();
    }
}
