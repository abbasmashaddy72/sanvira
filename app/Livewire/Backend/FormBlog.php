<?php

namespace App\Livewire\Backend;

use App\Models\Blog;
use App\Models\Team;
use Livewire\Component;
use WireUi\Traits\Actions;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;

class FormBlog extends Component
{
    use Actions;
    use WithFileUploads;

    // Model Values
    public $title, $image, $tags, $excerpt, $description;

    // Custom Values
    public $action, $isUploaded = false, $blog_id;

    protected $rules = [
        'title' => '',
        'image' => '',
        'tags' => '',
        'excerpt' => '',
        'description' => ''
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);

        if (gettype($this->image) != 'string') {
            $this->isUploaded = true;
        }
    }

    public function submit()
    {
        $validatedData = $this->validate();
        abort_if(Gate::denies('blog_edit'), 403);

        $validatedData = $this->validate();

        if (gettype($this->image) != 'string') {
            $validatedData['image'] = $this->image->store('blog_images');
        }

        if (!empty($this->blog_id)) {
            Blog::where('id', $this->blog_id)->update($validatedData);
        } else {
            Blog::create($validatedData);
        }

        $this->redirect(route('admin.blog'));

        if (!empty($this->blog_id)) {
            $this->notification()->success($title = 'Blog Updated Successfully!');
        } else {
            $this->notification()->success($title = 'Blog Saved Successfully!');
        }
    }

    public function mount($blog_id)
    {
        if (empty($this->blog_id) && is_null($this->blog_id)) {
            abort_if(Gate::denies('blog_add'), 403);

            return;
        }
        abort_if(Gate::denies('blog_edit'), 403);
        $data = Blog::findOrFail($blog_id);
        $this->title = $data->title;
        $this->image = $data->image;
        $this->tags = $data->tags;
        $this->excerpt = $data->excerpt;
        $this->description = $data->description;
    }

    public function render()
    {
        return view('livewire.backend.form-blog');
    }
}
