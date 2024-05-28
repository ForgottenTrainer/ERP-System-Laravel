<?php

namespace App\Livewire\Document;

use Livewire\Attributes\Validate;
use App\Models\Document;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Form extends Component
{
    public ?Document $document = null;

    #[Validate('required|min:5')]
    public $title = '';

    #[Validate('required|min:1')]
    public $document_number = '';

    public $document_type_id;
    public $user_id;
    public $type;
    public $documentId;

    public function mount($type, $document = null)
    {
        $this->type = $type;
        $this->document_type_id = $this->type->id;
        $this->user_id = Auth::id();

        if ($document) {
            $this->setDocument($document);
        }
    }

    public function setDocument(Document $document)
    {
        $this->document = $document;
        $this->title = $document->title;
        $this->document_number = $document->document_number;
        $this->document_type_id = $document->document_type_id;
        $this->user_id = $document->user_id;
    }

    public function submit()
    {
        $this->validate();

        if ($this->document) {
            $this->update();
        } else {
            $this->save();
        }
    }



    public function save()
    {
        $this->validate();

        Document::create($this->only(['title', 'document_number', 'document_type_id', 'user_id']));

        $this->dispatch(
            'alert',
            type: 'success',
            title: 'Creado correctamente'
        ); 

    }

    public function update()
    {
        $this->validate();

        $this->document->update($this->only(['title', 'document_number', 'document_type_id', 'user_id']));

        $this->dispatch(
            'alert',
            type: 'success',
            title: 'Editado correctamente'
        ); 

    }

    public function render()
    {
        return view('livewire.document.form');
    }

}
