<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
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
}
