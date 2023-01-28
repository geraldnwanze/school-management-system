<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClassRoomRequest;
use App\Http\Requests\UpdateClassRoomRequest;
use App\Models\ClassRoom;
use Illuminate\Support\Facades\Log;

class ClassRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = ClassRoom::paginate(10);
        return view('dashboard.class.index', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.class.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreClassRoomRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClassRoomRequest $request)
    {
        try {
            if (!ClassRoom::create($request->validated())) {
                return back()->with('error', 'something went wrong');
            }
            return redirect()->route('dashboard.classes.index')->with('success', 'new class created');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            dd($th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClassRoom  $classRoom
     * @return \Illuminate\Http\Response
     */
    public function show(ClassRoom $class)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClassRoom  $classRoom
     * @return \Illuminate\Http\Response
     */
    public function edit(ClassRoom $class)
    {
        return view('dashboard.class.edit', compact('class'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateClassRoomRequest  $request
     * @param  \App\Models\ClassRoom  $classRoom
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClassRoomRequest $request, ClassRoom $class)
    {
        try {
            if (!$class->update($request->validated())) {
                return back()->with('error', 'something went wrong');
            }
            return redirect()->route('dashboard.classes.index')->with('success', 'class updated');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            dd($th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClassRoom  $classRoom
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClassRoom $class)
    {
        try {
            if (!$class->delete()) {
                return redirect()->route('dashboard.classes.index')->with('error', 'something went wrong');
            }
            return redirect()->route('dashboard.classes.index')->with('success', 'class deleted');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            dd($th->getMessage());
        }
    }

    public function toggleStatus(ClassRoom $class)
    {
        try {
            if (!$class->update(['active' => !$class->active])) {
                return redirect()->route('dashboard.classes.index')->with('error', 'something went wrong');
            }
            return redirect()->route('dashboard.classes.index')->with('success', 'class status updated');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            dd($th->getMessage());
        }
    }
}
