<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClassRoomRequest;
use App\Http\Requests\UpdateClassRoomRequest;
use App\Models\ClassRoom;
use Illuminate\Support\Facades\Log;

class ClassRoomController extends Controller
{
    public function index()
    {
        $classes = ClassRoom::paginate(10);
        return view('dashboard.class.index', compact('classes'));
    }

    public function create()
    {
        return view('dashboard.class.create');
    }

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

    public function show(ClassRoom $class)
    {
        //
    }

    public function edit(ClassRoom $class)
    {
        return view('dashboard.class.edit', compact('class'));
    }

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

    public function deleted()
    {
        $classes = ClassRoom::onlyTrashed()->paginate(10);
        return view('dashboard.class.deleted', compact('classes'));
    }

    public function restore($class)
    {
        try {
            if (!ClassRoom::onlyTrashed()->find($class)->update(['deleted_at' => null])) {
                return redirect()->route('dashboard.classes.index')->with('error', 'something went wrong');
            }
            return redirect()->route('dashboard.classes.index')->with('success', 'class restored');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            dd($th->getMessage());
        }
    }
 
    public function forceDelete($class)
    {
        try {
            if (!ClassRoom::onlyTrashed()->find($class)->forceDelete()) {
                return redirect()->route('dashboard.classes.deleted')->with('error', 'something went wrong');
            }
            return redirect()->route('dashboard.classes.deleted')->with('success', 'class permanently deleted');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            dd($th->getMessage());
        }
    }
}
