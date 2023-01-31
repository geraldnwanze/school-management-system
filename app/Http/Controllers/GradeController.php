<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGradeRequest;
use App\Http\Requests\UpdateGradeRequest;
use App\Models\Grade;
use Illuminate\Support\Facades\Log;

class GradeController extends Controller
{
    public function index()
    {
        $data['grades'] = Grade::orderBy('grade', 'ASC')->get();
        return view('dashboard.grade.index', $data);
    }

    public function create()
    {
        return view('dashboard.grade.create');
    }

    public function store(StoreGradeRequest $request)
    {
        try {
            if($request->min >= $request->max){
                return back()->with('error', 'minimum score must be less than maximum score');
            }
            if($request->max <= $request->min){
                return back()->with('error', 'maximum score must be less than minimum score');
            }
            
            $storeGrade = Grade::create($request->validated());
            if($storeGrade){
                return redirect()->route('dashboard.grades.index')->with('success', 'Grade was created successfully!');
            }
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
        }
    }

    public function show(Grade $grade)
    {
        //
    }

    public function edit(Grade $grade)
    {
        return view('dashboard.grade.edit', compact('grade'));
    }

    public function update(UpdateGradeRequest $request, Grade $grade)
    {
        try {
            if($request->min >= $request->max){
                return back()->with('error', 'minimum score must be less than maximum score');
            }
            if($request->max <= $request->min){
                return back()->with('error', 'maximum score must be less than minimum score');
            }

            if($grade->update($request->validated())){
                return redirect(route('dashboard.grades.index'))->with('success', 'You have successfully updated grade');
            }
        } catch (\Throwable $th) {
            //throw $th;
            // return back()->with('error', 'grade could not be updated at the moment');
            dd($th->getMessage());
        }
    }

    public function destroy(Grade $grade)
    {
        try {
            if(!$grade->delete()){
                return back()->with('error', 'Grade could not be deleted');
            }
            return redirect()->route('dashboard.grades.index')->with('success', 'Grade removed successfully');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function deleted()
    {
        $grades = Grade::onlyTrashed()->paginate(10);
        return view('dashboard.grade.deleted', compact('grades'));
    }

    public function restore($grade)
    {
        try {
            if (!Grade::onlyTrashed()->find($grade)->update(['deleted_at' => null])) {
                return redirect()->route('dashboard.grades.index')->with('error', 'something went wrong');
            }
            return redirect()->route('dashboard.grades.index')->with('success', 'grade restored');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            dd($th->getMessage());
        }
    }

    public function forceDelete($grade)
    {
        try {
            if (!Grade::onlyTrashed()->find($grade)->forceDelete()) {
                return redirect()->route('dashboard.grades.deleted')->with('error', 'something went wrong');
            }
            return redirect()->route('dashboard.grades.deleted')->with('success', 'grade permanently deleted');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            dd($th->getMessage());
        }
    }
}
