<?php

namespace App\Http\Livewire\Backend\Forms;

use Livewire\Component;
use Livewire\WithFileUploads;
use WireUi\Traits\Actions;

class StaticHomepage extends Component
{
    use WithFileUploads, Actions;

    public $footer_logo, $logo, $short_description,$privacy_policy,$terms_conditions, $twitter, $facebook, $instagram, $linkedin, $youtube, $google_business, $embed_map_link;

    public $homeImageIsUploaded = false;
    public $logoIsUploaded = false;

    public function mount()
    {
        $this->footer_logo = get_static_option('footer_logo');
        $this->logo = get_static_option('logo');
        $this->short_description = get_static_option('short_description');
        $this->privacy_policy = get_static_option('privacy_policy');
        $this->terms_conditions = get_static_option('terms_conditions');
        $this->twitter = get_static_option('twitter');
        $this->facebook = get_static_option('facebook');
        $this->instagram = get_static_option('instagram');
        $this->linkedin = get_static_option('linkedin');
        $this->youtube = get_static_option('youtube');
        $this->google_business = get_static_option('google_business');
        $this->embed_map_link = get_static_option('embed_map_link');
    }

    protected $rules = [
        'footer_logo' => 'required',
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

        if (gettype($this->footer_logo) != 'string') {
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
            if ($key == 'footer_logo' && !empty($validatedData['footer_logo']) && gettype($validatedData['footer_logo']) != 'string') {
                $footer_logo = $validatedData['footer_logo']->store('frontend', 'public');
                set_static_option($key, $footer_logo);
                unset($validatedData['footer_logo']);
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
