<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;
use App\Models\Subject;
use Illuminate\Support\Facades\Log;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subjects = Subject::orderBy('name', 'asc')->paginate(10);
        return view('dashboard.subjects.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.subjects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSubjectRequest  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        return view('dashboard.subjects.edit', compact('subject'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSubjectRequest  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        try {
            if (!$subject->delete()) {
                return back()->with('error', 'something went wrong');
            }
            return back()->with('success', 'subject deleted');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            dd($th->getMessage());
        }
    }

    public function toggleStatus(Subject $subject)
    {
        try {
            if (!$subject->update(['active' => !$subject->active])) {
                return back()->with('error', 'something went wrong');
            }
            return back()->with('success', 'status updated');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            dd($th->getMessage());
        }
    }
}
