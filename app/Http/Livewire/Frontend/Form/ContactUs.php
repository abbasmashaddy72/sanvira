<?php

namespace App\Http\Livewire\Frontend\Form;

use App\Models\ContactUs as ModelsContactUs;
use Livewire\Component;

class ContactUs extends Component
{
    // Model Values
    public $name;

    public $email;

    public $company_name;

    public $job_title;

    public $tob;

    public $contact_no;

    public $message;

    public $agree;

    // Custom Values
    public $successMessage = false;

    protected $rules = [
        'name' => 'required',
        'email' => 'required',
        'company_name' => 'required',
        'job_title' => 'required',
        'tob' => 'required',
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
