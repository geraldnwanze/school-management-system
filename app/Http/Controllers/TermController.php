<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTermRequest;
use App\Http\Requests\UpdateTermRequest;
use App\Models\Term;
use Illuminate\Support\Facades\Log;

class TermController extends Controller
{
    public function index()
    {
        $terms = Term::all();
        return view('dashboard.terms.index', compact('terms'));
    }

    public function create()
    {
        return view('dashboard.terms.create');
    }

    public function store(StoreTermRequest $request)
    {
        try {
            if (!Term::create($request->validated())) {
                return back()->with('error', 'something went wrong');
            }
            return redirect()->route('dashboard.terms.index')->with('success', 'new term created');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return back()->with('error', 'something went wrong');
        }
    }

    public function show(Term $term)
    {
        //
    }

    public function edit(Term $term)
    {
        return view('dashboard.terms.edit', compact('term'));
    }

    public function update(UpdateTermRequest $request, Term $term)
    {
        try {
            if (!$term->update($request->validated())) {
                return back()->with('error', 'something went wrong');
            }
            return redirect()->route('dashboard.terms.index')->with('success', 'term updated');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return back()->with('error', 'something went wrong');
        }
    }

    public function toggleStatus(Term $term)
    {
        try {
            if (!$term->update(['active' => !$term->active])) {
                return back()->with('error', 'something went wrong');
            }
            return redirect()->route('dashboard.terms.index')->with('success', 'status updated');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return back()->with('error', 'something went wrong');
        }
    }

    public function destroy(Term $term)
    {
        try {
            if (!$term->delete()) {
                return back()->with('error', 'something went wrong');
            }
            return redirect()->route('dashboard.terms.index')->with('success', 'term deleted');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return back()->with('error', 'something went wrong');
        }
    }
}
