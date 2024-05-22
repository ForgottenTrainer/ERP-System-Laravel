<?php

namespace App\Livewire\Company;

use App\Models\Company;

use Livewire\Component;

class Form extends Component
{
    public $name;
    public $email;
    public $mobile;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'mobile' => 'required|digits:10'
    ];

    public function submit()
    {
        $validatedData = $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'mobile' => 'required|digits:10'
        ]);

        Company::create($validatedData);

        $this->dispatch('companyStored', 'La empresa fue creada con éxito.');

        $this->reset(['name', 'email', 'mobile']);
        return redirect()->back();
    }
    public function render()
    {
        return view('livewire.company.form');
    }
}
