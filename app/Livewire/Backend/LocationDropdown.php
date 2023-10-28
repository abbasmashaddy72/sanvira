<?php

namespace App\Livewire\Backend;

use App\Models\City;
use App\Models\State;
use App\Models\Country;
use Livewire\Component;

class LocationDropdown extends Component
{
    public $countries;
    public $states;
    public $cities;

    public $selectedCountry;
    public $selectedState;
    public $selectedCity;

    public $cityId;
    public $cityData;

    public function mount()
    {
        $this->countries = Country::all();
        $this->states = [];
        $this->cities = [];

        if (!empty($this->cityId)) {
            $this->cityData = City::findOrFail($this->cityId);
            $this->selectedCountry = $this->cityData->country_id;
            $this->selectedState = $this->cityData->state_id;
            $this->selectedCity = $this->cityId;
            $this->cities = City::where('state_id', $this->cityData->state_id)->get();
            $this->states = State::where('country_id', $this->cityData->country_id)->get();
        }
    }

    public function updatedSelectedCountry($countryId)
    {
        $this->states = State::where('country_id', $countryId)->get();
        $this->cities = [];
        $this->selectedState = null;
        $this->selectedCity = null;
    }

    public function updatedSelectedState($stateId)
    {
        $this->cities = City::where('state_id', $stateId)->get();
        $this->selectedCity = null;
    }

    public function render()
    {
        return view('livewire.backend.location-dropdown');
    }
}
