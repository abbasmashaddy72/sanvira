<?php

namespace App\Livewire\Backend;

use Illuminate\Support\Facades\Gate;
use Livewire\Component;
use Livewire\WithFileUploads;
use WireUi\Traits\Actions;

class StaticHomepage extends Component
{
    use WithFileUploads;
    use Actions;

    public $footer_logo;

    public $logo;

    public $short_description;

    public $twitter;

    public $facebook;

    public $instagram;

    public $linkedin;

    public $youtube;

    public $google_business;

    public $embed_map_link;

    public $privacy_policy;

    public $terms_of_use;

    public $return_refunds;

    public $type;

    public $logoIsUploaded = false;

    public $footerLogoIsUploaded = false;

    public function mount()
    {
        abort_if(Gate::denies('homepage'), 403);
        $this->footer_logo = get_static_option('footer_logo');
        $this->logo = get_static_option('logo');
        $this->short_description = get_static_option('short_description');
        $this->twitter = get_static_option('twitter');
        $this->facebook = get_static_option('facebook');
        $this->instagram = get_static_option('instagram');
        $this->linkedin = get_static_option('linkedin');
        $this->youtube = get_static_option('youtube');
        $this->google_business = get_static_option('google_business');
        $this->embed_map_link = get_static_option('embed_map_link');
        $this->privacy_policy = get_static_option('privacy_policy');
        $this->terms_of_use = get_static_option('terms_of_use');
        $this->return_refunds = get_static_option('return_refunds');
    }

    protected $rules = [
        'footer_logo' => 'required',
        'logo' => 'required',
        'short_description' => 'required',
        'twitter' => '',
        'facebook' => '',
        'instagram' => '',
        'linkedin' => '',
        'youtube' => '',
        'google_business' => '',
        'embed_map_link' => 'required',
        'privacy_policy' => '',
        'terms_of_use' => '',
        'return_refunds' => '',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);

        if (gettype($this->logo) != 'string') {
            $this->logoIsUploaded = true;
        }
        if (gettype($this->footer_logo) != 'string') {
            $this->footerLogoIsUploaded = true;
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
        $this->notification()->success($title = 'Data Saved / Updated Successfully!');
    }

    public function render()
    {
        return view('livewire.backend.static-homepage');
    }
}
