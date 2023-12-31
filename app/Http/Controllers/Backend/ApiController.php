<?php

namespace App\Http\Controllers\Backend;

use App\Models\City;
use App\Models\State;
use App\Models\Country;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Database\Eloquent\Builder;

class ApiController extends Controller
{
    public function categories(Request $request, $parent_id = null)
    {
        $query = Category::query()->select('id', 'name')
            ->orderBy('name')
            ->when($request->search, function (Builder $query) use ($request) {
                $query->where('name', 'like', "%{$request->search}%");
            })
            ->when($parent_id !== null, function (Builder $query) use ($parent_id) {
                $query->where('parent_id', $parent_id);
            });

        if ($request->exists('selected')) {
            $query->whereIn('id', $request->input('selected', []));
        }

        $data = $query->limit(10)->get();

        return $data;
    }

    public function users(Request $request)
    {
        $data = User::query()->select('id', 'name')
            ->orderBy('name')
            ->when($request->search, fn (Builder $query) => $query->where('name', 'like', "%{$request->search}%"))
            ->when(
                $request->exists('selected'),
                fn (Builder $query) => $query->whereIn('id', $request->input('selected', [])),
                fn (Builder $query) => $query->limit(10)
            )
            ->get();

        return $data;
    }

    public function countries(Request $request)
    {
        $data = Country::query()->select('id', 'name')
            ->orderBy('name')
            ->when($request->search, fn (Builder $query) => $query->where('name', 'like', "%{$request->search}%"))
            ->when(
                $request->exists('selected'),
                fn (Builder $query) => $query->whereIn('id', $request->input('selected', [])),
                fn (Builder $query) => $query->limit(10)
            )
            ->get();

        return $data;
    }

    public function states(Request $request)
    {
        $data = State::query()->select('id', 'name')
            ->orderBy('name')
            ->when($request->search, fn (Builder $query) => $query->where('name', 'like', "%{$request->search}%"))
            ->when(
                $request->exists('selected'),
                fn (Builder $query) => $query->whereIn('id', $request->input('selected', [])),
                fn (Builder $query) => $query->limit(10)
            )
            ->get();

        return $data;
    }

    public function cities(Request $request)
    {
        $data = City::query()->select('id', 'name')
            ->orderBy('name')
            ->when($request->search, fn (Builder $query) => $query->where('name', 'like', "%{$request->search}%"))
            ->when(
                $request->exists('selected'),
                fn (Builder $query) => $query->whereIn('id', $request->input('selected', [])),
                fn (Builder $query) => $query->limit(10)
            )
            ->get();

        return $data;
    }
}
