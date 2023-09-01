<?php

namespace App\Http\Livewire\Frontend\Form;

use App\Models\Role;
use App\Models\Supplier;
use App\Models\SupplierTeam;
use App\Models\SupplierTransaction;
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

    // Supplier Model Values
    public $supplier_name;

    public $supplier_address;

    public $city;

    public $state;

    public $country;

    public $tln;

    public $doe;

    public $toc;

    public $tob;

    public $contact_no;

    public $job_title;

    public $agree;

    private $validatedData;

    private $user;

    protected $rules = [
        'supplier_name' => '',
        'supplier_address' => '',
        'city' => '',
        'state' => '',
        'country' => '',
        'tln' => '',
        'doe' => '',
        'toc' => '',
        'tob' => '',
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

    public function supplierRegister()
    {
        $supplier = Supplier::create([
            'user_id' => $this->user->id,
            'company_name' => $this->validatedData['supplier_name'],
            'company_email' => null,
            'company_address' => $this->validatedData['supplier_address'],
            'company_number' => null,
            'company_locality' => $this->validatedData['city'] . ', ' . $this->validatedData['state'] . ', ' . $this->validatedData['country'],
            'tagline' => null,
            'logo' => null,
            'doe' => $this->validatedData['doe'],
            'license' => $this->validatedData['tln'],
            'type' => $this->validatedData['toc'],
            'website_url' => null,
            'description' => null,
            'terms_conditions' => null,
            'agree' => $this->validatedData['agree'],
        ]);

        SupplierTeam::create([
            'supplier_id' => $supplier->id,
            'user_id' => $this->user->id,
            'name' => $this->validatedData['name'],
            'email' => $this->validatedData['email'],
            'phone' => $this->validatedData['contact_no'],
            'poc' => $this->validatedData['job_title'],
            'image' => null,
        ]);

        SupplierTransaction::create([
            'supplier_id' => $supplier->id,
            'account_type' => 'Trail',
            'transaction_type' => 'Pending',
            'amount' => '0',
            'start_date' => now()->format('Y-m-d'),
            'end_days' => 30,
            'image' => null,
            'status' => 'Active',
        ]);

        $this->user->roles()->attach(Role::where('name', 'Supplier')->pluck('id'));
    }

    public function submit(): RedirectResponse | Redirector
    {
        $this->validatedData = $this->validate();

        $this->user = User::create([
            'name' => $this->validatedData['name'],
            'email' => $this->validatedData['email'],
            'password' => Hash::make(explode(' ', $this->validatedData['name'])[0] . '@' . substr($this->validatedData['contact_no'], -3)),
        ]);

        if ($this->tob == 'Manufacturer' || $this->tob == 'Supplier') {
            $this->supplierRegister();
        } elseif ($this->tob == 'Contractor') {
            //
        } else {
            //
        }

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
