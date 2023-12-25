<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Support\Facades\Gate;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /**
         * @get('/admin/blog')
         * @name('admin.blog.index')
         * @middlewares('web', auth')
         */
        abort_if(Gate::denies('blog_list'), 403);
        view()->share('title', 'Blog');

        return view('pages.backend.blogs.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        /**
         * @get('/admin/blog/create')
         * @name('admin.blog.create')
         * @middlewares('web', auth')
         */
        abort_if(Gate::denies('blog_add'), 403);
        view()->share('title', 'Blog Add');

        return view('pages.backend.blogs.add_edit');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /**
         * @get('/admin/blog/{blog}/edit')
         * @name('admin.blog.edit')
         * @middlewares('web', auth')
         */
        abort_if(Gate::denies('blog_edit'), 403);
        view()->share('title', 'Blog Edit');

        return view('pages.backend.blogs.add_edit', compact('id'));
    }
}
