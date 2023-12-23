<?php

namespace App\Livewire\Frontend\Form;

use App\Models\ContactUs as ModelsContactUs;
use Livewire\Component;

class ContactUs extends Component
{
    // Model Keys
    public $name;

    public $email;

    public $company_name;

    public $contact_no;

    public $message;

    public $agree;

    // Custom Keys
    public $successMessage = false;

    protected $rules = [
        'name' => 'required',
        'email' => 'required',
        'company_name' => 'required',
        'contact_no' => 'required',
        'message' => 'required',
        'agree' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $validatedData = $this->validate();

        ModelsContactUs::create($validatedData);

        $this->reset();
        $this->successMessage = true;
    }

    public function render()
    {
        return view('livewire.frontend.form.contact-us');
    }
}
