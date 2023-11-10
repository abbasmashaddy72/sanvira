<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class DeliveryNoteController extends Controller
{
    public function __construct()
    {
        view()->share('title', 'Delivery Note');
    }

    public function index()
    {
        abort_if(Gate::denies('delivery_note_list'), 403);

        return view('pages.backend.delivery_note.index');
    }

    public function add()
    {
        abort_if(Gate::denies('delivery_note_add'), 403);
        view()->share('title', 'Delivery Note Add');

        return view('pages.backend.delivery_note.add_edit');
    }

    public function edit($id)
    {
        abort_if(Gate::denies('delivery_note_edit'), 403);
        view()->share('title', 'Delivery Note Edit');

        return view('pages.backend.delivery_note.add_edit', compact('id'));
    }
}
