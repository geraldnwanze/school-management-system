<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::orderBy('name', 'asc')->paginate(10);
        return view('dashboard.subjects.index', compact('subjects'));
    }

    public function create()
    {
        return view('dashboard.subjects.create');
    }

    public function store(StoreSubjectRequest $request)
    {
        try {
            if (!Subject::create($request->validated())) {
                return back()->with('error', 'something went wrong');
            }
            return redirect()->route('dashboard.subjects.index')->with('success', 'new subject created');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            dd($th->getMessage());
        }
    }

    public function show(Subject $subject)
    {
        //
    }

    public function edit(Subject $subject)
    {
        return view('dashboard.subjects.edit', compact('subject'));
    }

    public function update(UpdateSubjectRequest $request, Subject $subject)
    {
        try {
            if (!$subject->update($request->validated())) {
                return back()->with('error', 'something went wrong');
            }
            return redirect()->route('dashboard.subjects.index')->with('success', 'subject updated');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            dd($th->getMessage());
        }
    }

    public function toggleStatus(Subject $subject)
    {
        try {
            if (!$subject->update(['active' => !$subject->active])) {
                return redirect()->route('dashboard.subjects.index')->with('error', 'something went wrong');
            }
            return redirect()->route('dashboard.subjects.index')->with('success', 'status updated');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            dd($th->getMessage());
        }
    }

    public function destroy(Subject $subject)
    {
        try {
            if (!$subject->delete()) {
                return redirect()->route('dashboard.subjects.index')->with('error', 'something went wrong');
            }
            return redirect()->route('dashboard.subjects.index')->with('success', 'subject deleted');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            dd($th->getMessage());
        }
    }

    public function deleted()
    {
        $subjects = Subject::onlyTrashed()->paginate(10);
        return view('dashboard.subjects.deleted', compact('subjects'));
    }

    public function restore($subject)
    {
        try {
            if (!Subject::onlyTrashed()->find($subject)->update(['deleted_at' => null])) {
                return redirect()->route('dashboard.subjects.index')->with('error', 'something went wrong');
            }
            return redirect()->route('dashboard.subjects.index')->with('success', 'subject restored');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            dd($th->getMessage());
        }
    }

    public function forceDelete($subject)
    {
        try {
            if (!Subject::onlyTrashed()->find($subject)->forceDelete()) {
                return redirect()->route('dashboard.subjects.deleted')->with('error', 'something went wrong');
            }
            return redirect()->route('dashboard.subjects.deleted')->with('success', 'subject permanently deleted');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            dd($th->getMessage());
        }
    }
}
