<?php

namespace App\Livewire\Backend;

use App\Models\Testimonial;
use Illuminate\Support\Facades\Gate;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;
use WireUi\Traits\Actions;

class ModalTestimonial extends ModalComponent
{
    use Actions;
    use WithFileUploads;

    // Set Data
    public $testimonial_id;

    public $user_id;

    // Model Values
    public $designation;

    public $logo;

    public $message;

    public $show_designation;

    public $rating;

    public $logoIsUploaded = false;

    public $name;

    public function mount()
    {
        if (empty($this->testimonial_id)) {
            abort_if(Gate::denies('testimonial_add'), 403);

            return;
        }
        abort_if(Gate::denies('testimonial_edit'), 403);
        $data = Testimonial::findOrFail($this->testimonial_id);
        $this->user_id = $data->user_id;
        $this->designation = $data->designation;
        $this->logo = $data->logo;
        $this->message = $data->message;
        $this->show_designation = $data->show_designation;
        $this->rating = $data->rating;
        $this->name = $data->users->name;
    }

    protected $rules = [
        'user_id' => 'required',
        'designation' => 'required',
        'logo' => '',
        'message' => 'required',
        'show_designation' => 'required',
        'rating' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
        if (gettype($this->logo) != 'string') {
            $this->logoIsUploaded = true;
        }
    }

    public function add()
    {
        $validatedData = $this->validate();

        if (!empty($this->testimonial_id)) {
            if (!empty($this->logo) && gettype($this->logo) != 'string') {
                $validatedData['logo'] = $this->logo->store('testimonial', 'public');
            }
            Testimonial::where('id', $this->testimonial_id)->update($validatedData);

            $this->notification()->success($title = 'Testimonial Updated Successfully!');
        } else {
            if (!empty($this->logo) && gettype($this->logo) != 'string') {
                $validatedData['logo'] = $this->logo->store('testimonial', 'public');
            }
            Testimonial::create($validatedData);

            $this->notification()->success($title = 'Testimonial Saved Successfully!');
        }

        $this->dispatchatch('refreshLivewireDatatable');

        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.backend.modal-testimonial');
    }
}
