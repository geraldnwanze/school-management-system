<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClassRoomRequest;
use App\Http\Requests\UpdateClassRoomRequest;
use App\Http\Resources\ClassRoomResource;
use App\Models\ClassRoom;
use App\Traits\ApiResponses;

class ClassRoomController extends Controller
{
    use ApiResponses;

    public function index()
    {
        return $this->success(ClassRoomResource::collection(ClassRoom::paginate()));
    }

    public function store(StoreClassRoomRequest $request)
    {
        $class = new ClassRoomResource(ClassRoom::create($request->validated()));
        return $this->success($class, 'Class Created', 201);
    }

    public function show(ClassRoom $class)
    {
        return $this->success($class, 'Class Retrieved');
    }

    public function update(UpdateClassRoomRequest $request, ClassRoom $class)
    {
        $class->update($request->validated());
        $class = new ClassRoomResource($class);
        return $this->success($class, 'Class Updated');
    }

    public function toggleStatus(ClassRoom $class)
    {
        $class->update(['active' => !$class->active]);
        return $this->success($class, 'status updated');
    }

    public function destroy(ClassRoom $class)
    {
        $class->delete();
        return $this->success(null, 'class deleted', 204);
    }

    public function deleted()
    {
        $classes = ClassRoomResource::collection(ClassRoom::onlyTrashed()->paginate());
        return $this->success($classes, 'Records retrieved');
    }

    public function restore($class)
    {
        ClassRoom::onlyTrashed()->find($class)->restore();
        return $this->success(null, 'class restored', 204);
    }

    public function forceDelete($class)
    {
        ClassRoom::onlyTrashed()->find($class)->forceDelete();
        return $this->success(null, 'class permanently deleted', 204);
    }
}
