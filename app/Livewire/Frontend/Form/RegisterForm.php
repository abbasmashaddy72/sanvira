<?php

namespace App\Livewire\Frontend\Form;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\Redirector;
use Monarobase\CountryList\CountryListFacade;

class RegisterForm extends Component
{
    // User Model Values
    public $name;

    public $email;

    public $city;

    public $state;

    public $country;

    public $contact_no;

    public $job_title;

    public $agree;

    private $validatedData;

    private $user;

    protected $rules = [
        'city' => '',
        'state' => '',
        'country' => '',
        'name' => ['required', 'string', 'max:255'],
        'contact_no' => 'required',
        'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
        'job_title' => '',
        'agree' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit(): RedirectResponse | Redirector
    {
        $this->validatedData = $this->validate();

        $this->user = User::create([
            'name' => $this->validatedData['name'],
            'email' => $this->validatedData['email'],
            'password' => Hash::make(explode(' ', $this->validatedData['name'])[0] . '@' . substr($this->validatedData['contact_no'], -3)),
        ]);

        event(new Registered($this->user));

        auth()->login($this->user);

        return redirect(RouteServiceProvider::HOME());
    }

    public function render()
    {
        $countries = CountryListFacade::getList('en');

        return view('livewire.frontend.form.register-form', compact('countries'));
    }
}
