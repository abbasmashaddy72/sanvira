<?php

namespace App\Livewire\Backend;

use App\Models\Faq;
use App\Models\Role;
use WireUi\Traits\Actions;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use LivewireUI\Modal\ModalComponent;

class ModalFaq extends ModalComponent
{
    use Actions;

    use WithFileUploads;

    // Set Data
    public $faq_id;

    // Model Keys
    public $answer;

    public $question;

    public function mount()
    {
        if (empty($this->faq_id)) {
            abort_if(Gate::denies('faq_add'), 403);

            return;
        }
        abort_if(Gate::denies('faq_edit'), 403);
        $data = Faq::findOrFail($this->faq_id);
        $this->answer = $data->answer;
        $this->question = $data->question;
    }

    protected $rules = [
        'answer' => 'required',
        'question' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function add()
    {
        $validatedData = $this->validate();

        if (!empty($this->faq_id)) {
            Faq::where('id', $this->faq_id)->update($validatedData);

            $this->notification()->success($title = 'Faq Updated Successfully!');
        } else {
            Faq::create($validatedData);
            $this->notification()->success($title = 'Faq Saved Successfully!');
        }

        $this->dispatch('pg:eventRefresh-default');

        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.backend.modal-faq');
    }
}
