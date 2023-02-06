<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\ApiController;
use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;
use App\Http\Resources\SubjectResource;
use App\Models\Subject;
use App\Traits\ApiResponses;
use Illuminate\Http\Request;

class SubjectController extends ApiController
{
    use ApiResponses;

    public function index()
    {
        return SubjectResource::collection(Subject::all());
    }

    public function store(StoreSubjectRequest $request)
    {
        $subject = Subject::create($request->validated());
        
        return new SubjectResource($subject);
    }

    public function update(UpdateSubjectRequest $request, Subject $subject)
    {
        $subject->update($request->validated());
        return new SubjectResource($subject);
    }

    public function destroy(Subject $subject)
    {
        $subject->delete();
        return $this->success(null, 'subject deleted', 204);
    }

    public function deleted()
    {
        $subjects = SubjectResource::collection(Subject::onlyTrashed()->paginate());
        return $this->success($subjects, "Deleted Subjects Retrieved");
    }

    public function restore($subject)
    {
        $subject = Subject::onlyTrashed()->findOrFail($subject);
        $subject->restore();
        return $this->success(new SubjectResource($subject), 'Subject Restored');
    }

    public function forceDelete($subject)
    {
        Subject::onlyTrashed()->findOrFail($subject)->forceDelete();
        return $this->success(null, 'Subject Deleted', 204);
    }
}
