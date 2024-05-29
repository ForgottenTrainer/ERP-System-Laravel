<?php

namespace App\Livewire\Document;

use App\Models\Document;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class Attachments extends Component
{
    
    use WithFileUploads;

    #[Validate('image|max:1024')]
    public $file;

    public $document;

    public function save()
    {
        $this->validate([
            'file' => 'required|image|max:1024', // reglas de validación
        ]);

        if ($this->file) {
            $filepath = $this->file->store('attachments', 'public');
        } else {
            session()->flash('error', 'No se ha cargado ningún archivo');
        }        
    }

    public function render()
    {
        return view('livewire.document.attachments');
    }
}
