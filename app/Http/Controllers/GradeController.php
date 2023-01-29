<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGradeRequest;
use App\Http\Requests\UpdateGradeRequest;
use App\Models\Grade;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['grades'] = Grade::orderBy('grade', 'ASC')->get();
        return view('dashboard.grade.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.grade.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreGradeRequest  $request
     * @return \Illuminate\Http\Response
     */
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
                return back()->with('success', 'Grade was created successfully!');
            }
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function show(Grade $grade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function edit(Grade $grade)
    {
        return view('dashboard.grade.edit', compact('grade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGradeRequest  $request
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function destroy(Grade $grade)
    {
        try {
            if(!$grade->delete()){
                return back()->with('error', 'Grade could not be deeted');
            }
            return back()->with('success', 'Grade removed successfully');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
