<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\AssignClassAndSubject;
use App\Http\Requests\StoreAssignClassAndSubjectRequest;
use App\Http\Requests\UpdateAssignClassAndSubjectRequest;
use App\Models\ClassRoom;
use App\Models\Staff;
use App\Models\Subject;
use App\Traits\ActiveSession;

class AssignClassAndSubjectController extends Controller
{
    use ActiveSession;

    public function index(Staff $staff)
    {
        $data['staff'] = $staff;
        $data['classes'] = ClassRoom::all();
        $data['subjects'] = Subject::all();
        $data['currentSession'] = $this->activeSession();
        $data['assignedClassAndSubject'] = AssignClassAndSubject::where('staff_id', $staff->id)->get();
        return view('dashboard.staff.assign_class_and_subject', $data);
    }

    public function alreadyAssigned()
    {
        $staffs = Staff::all();
        $classes = ClassRoom::all();
        $subjects = Subject::all();
        $assigned = AssignClassAndSubject::with('classRoom', 'subject', 'staff')
            ->where('session', $this->activeSession())
            ->paginate(50);
        return view('dashboard.staff.already_assigned_class_and_subject', compact('assigned', 'staffs', 'classes', 'subjects'));
    }

    public function create()
    {
        //
    }

    public function store(StoreAssignClassAndSubjectRequest $request)
    {
        $alreadyAssigned = AssignClassAndSubject::where([
            'session' => $request->session,
            'class_room_id' => $request->class_room_id,
            'subject_id' => $request->subject_id,
            'staff_id' => $request->staff_id
        ])->first();

        if (!$alreadyAssigned) {
            try {
                $save = AssignClassAndSubject::create($request->validated());
                if ($save) {
                    return back()->with('success', 'You have assigned class and subject to staff');
                }
            } catch (\Throwable $th) {
                //throw $th;
                dd($th->getMessage());
            }
        }

        return back()->with('error', 'The selected Class and subject has already been assigned to this user.');
    }

    public function edit(AssignClassAndSubject $assignClassAndSubject)
    {
        //
    }

    public function update(UpdateAssignClassAndSubjectRequest $request, AssignClassAndSubject $assignClassAndSubject)
    {
        // dd($assignClassAndSubject);
        // dd($request->all());
        $alreadyAssigned = AssignClassAndSubject::where([
            'session' => $request->session,
            'class_room_id' => $request->class_room_id,
            'subject_id' => $request->subject_id,
            'staff_id' => $request->staff_id
        ])->first();
        
        if (!$alreadyAssigned) {
            try {
                $update = $assignClassAndSubject->update($request->validated());
                if ($update) {
                    return back()->with('success', 'record successfully updated');
                }
            } catch (\Throwable $th) {
                //throw $th;
                dd($th->getMessage());
            }
        }

        return back()->with('error', 'The selected Class and subject has already been assigned');

    }

    public function destroy(AssignClassAndSubject $assignClassAndSubject)
    {
        //before you delete already assigned mk sure it did not appear in result computation table
    }
}
