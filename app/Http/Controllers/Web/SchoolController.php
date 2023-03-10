<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSchoolRequest;
use App\Http\Requests\UpdateSchoolRequest;
use App\Models\School;
use Illuminate\Support\Facades\Log;

class SchoolController extends Controller
{
    public function index()
    {
        $school = School::first();
        return view('dashboard.school.index', compact('school'));
    }

    public function create()
    {
        //
    }

    public function store(StoreSchoolRequest $request)
    {
        //
    }

    public function show(School $school)
    {
        //
    }

    public function edit(School $school)
    {
        return view('dashboard.school.edit', compact('school'));
    }

    public function update(UpdateSchoolRequest $request, School $school)
    {
        try {
            $school->update($request->validated());
            return redirect()->route('dashboard.school.index');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return back()->with('error', 'somethign went wrong');
        }
    }


    public function destroy(School $school)
    {
        //
    }

    public function destroyed()
    {
        //
    }
}
