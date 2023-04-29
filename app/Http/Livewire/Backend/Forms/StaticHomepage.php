<?php

namespace App\Http\Livewire\Backend\Forms;

use Livewire\Component;
use Livewire\WithFileUploads;
use WireUi\Traits\Actions;

class StaticHomepage extends Component
{
    use WithFileUploads, Actions;

    public $home_image, $logo, $short_description, $twitter, $facebook, $instagram, $linkedin, $youtube, $google_business, $embed_map_link;

    public $homeImageIsUploaded = false;
    public $logoIsUploaded = false;

    public function mount()
    {
        $this->home_image = get_static_option('home_image');
        $this->logo = get_static_option('logo');
        $this->short_description = get_static_option('short_description');
        $this->twitter = get_static_option('twitter');
        $this->facebook = get_static_option('facebook');
        $this->instagram = get_static_option('instagram');
        $this->linkedin = get_static_option('linkedin');
        $this->youtube = get_static_option('youtube');
        $this->google_business = get_static_option('google_business');
        $this->embed_map_link = get_static_option('embed_map_link');
    }

    protected $rules = [
        'home_image' => 'required',
        'logo' => 'required',
        'short_description' => 'required',
        'twitter' => 'required',
        'facebook' => 'required',
        'instagram' => 'required',
        'linkedin' => 'required',
        'youtube' => 'required',
        'google_business' => 'required',
        'embed_map_link' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);

        if (gettype($this->home_image) != 'string') {
            $this->homeImageIsUploaded = true;
        }

        if (gettype($this->logo) != 'string') {
            $this->logoIsUploaded = true;
        }
    }

    public function add()
    {
        $validatedData = $this->validate();

        foreach ($validatedData as $key => $value) {
            if ($key == 'home_image' && !empty($validatedData['home_image']) && gettype($validatedData['home_image']) != 'string') {
                $home_image = $validatedData['home_image']->store('frontend', 'public');
                set_static_option($key, $home_image);
                unset($validatedData['home_image']);
            } elseif ($key == 'logo' && !empty($validatedData['logo']) && gettype($validatedData['logo']) != 'string') {
                $logo = $validatedData['logo']->store('frontend', 'public');
                set_static_option($key, $logo);
                unset($validatedData['logo']);
            } else {
                set_static_option($key, $value);
            }
        }
        $this->notification()->success($title = 'Data Saved Successfully!');
    }

    public function render()
    {
        return view('livewire.backend.forms.static-homepage');
    }
}
