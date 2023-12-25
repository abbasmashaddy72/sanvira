<?php

namespace App\Livewire\Frontend\Filters;

use App\Models\Blog;
use Livewire\Component;
use Livewire\WithPagination;

class Blogs extends Component
{
    use WithPagination;

    public function render()
    {
        $data = Blog::paginate(8);

        return view('livewire.frontend.filters.blogs', compact('data'));
    }
}
