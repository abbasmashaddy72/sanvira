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

    // Homepage Details
    public $logo;
    public $hero_image;
    public $tag_line;
    public $hero_message;
    public $mission_message;
    public $mission_points;
    public $vision_message;
    public $vision_points;
    public $testimonial_message;
    public $blog_message;
    public $cta_message;

    // Social Media Links
    public $twitter;
    public $facebook;
    public $instagram;
    public $linkedin;
    public $youtube;
    public $google_business;

    // Company Details
    public $contact_no;
    public $email;
    public $google_map_link;

    // Pages
    public $privacy_policy;
    public $terms_of_use;
    public $return_refunds;

    // Custom
    public $type;
    public $logoIsUploaded = false;
    public $heroImageIsUploaded = false;

    public function mount()
    {
        abort_if(Gate::denies('homepage'), 403);
        // Homepage Details
        $this->logo = get_static_option('logo');
        $this->hero_image = get_static_option('hero_image');
        $this->tag_line = get_static_option('tag_line');
        $this->hero_message = get_static_option('hero_message');
        $this->mission_message = get_static_option('mission_message');
        $this->mission_points = get_static_option('mission_points');
        $this->vision_message = get_static_option('vision_message');
        $this->vision_points = get_static_option('vision_points');
        $this->testimonial_message = get_static_option('testimonial_message');
        $this->blog_message = get_static_option('blog_message');
        $this->cta_message = get_static_option('cta_message');

        // Social Media Links
        $this->twitter = get_static_option('twitter');
        $this->facebook = get_static_option('facebook');
        $this->instagram = get_static_option('instagram');
        $this->linkedin = get_static_option('linkedin');
        $this->youtube = get_static_option('youtube');
        $this->google_business = get_static_option('google_business');

        // Company Details
        $this->contact_no = get_static_option('contact_no');
        $this->email = get_static_option('email');
        $this->google_map_link = get_static_option('google_map_link');

        // Pages
        $this->privacy_policy = get_static_option('privacy_policy');
        $this->terms_of_use = get_static_option('terms_of_use');
        $this->return_refunds = get_static_option('return_refunds');
    }

    protected $rules = [
        // Homepage Details
        'logo' => 'required',
        'hero_image' => 'required',
        'tag_line' => 'required',
        'hero_message' => 'required',
        'mission_message' => 'required',
        'mission_points' => 'required',
        'vision_message' => 'required',
        'vision_points' => 'required',
        'testimonial_message' => '',
        'blog_message' => '',
        'cta_message' => '',

        // Social Media Links
        'twitter' => '',
        'facebook' => '',
        'instagram' => '',
        'linkedin' => '',
        'youtube' => '',
        'google_business' => '',

        // Company Details
        'contact_no' => 'required',
        'email' => 'required',
        'google_map_link' => 'required',

        // Pages
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
        if (gettype($this->hero_image) != 'string') {
            $this->heroImageIsUploaded = true;
        }
    }

    public function add()
    {
        $validatedData = $this->validate();

        foreach ($validatedData as $key => $value) {
            if ($key == 'hero_image' && !empty($validatedData['hero_image']) && gettype($validatedData['hero_image']) != 'string') {
                $hero_image = $validatedData['hero_image']->store('frontend', 'public');
                set_static_option($key, $hero_image);
                unset($validatedData['hero_image']);
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
