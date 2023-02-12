<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\AssignClassAndSubject;
use App\Http\Requests\StoreAssignClassAndSubjectRequest;
use App\Http\Requests\UpdateAssignClassAndSubjectRequest;
use App\Models\ClassRoom;
use App\Models\Staff;
use App\Models\Subject;

class AssignClassAndSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Staff $staff)
    {
        $data['staff'] = $staff;
        $data['classes'] = ClassRoom::all();
        $data['subjects'] = Subject::all();
        $data['assignedClassAndSubject'] = AssignClassAndSubject::where('staff_id', $staff->id)->get();
        return view('dashboard.staff.assign_class_and_subject', $data);
    }

    public function alreadyAssigned()
    {
        $staffs = Staff::all();
        $classes = ClassRoom::all();
        $subjects = Subject::all();
        $assigned = AssignClassAndSubject::with('classRoom', 'subject', 'staff')->paginate(50);
        return view('dashboard.staff.already_assigned_class_and_subject', compact('assigned', 'staffs', 'classes', 'subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAssignClassAndSubjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAssignClassAndSubjectRequest $request)
    {
        $currentSession = "2022/2023";
        $alreadyAssigned = AssignClassAndSubject::where('session', $currentSession)
            ->where('class_room_id', $request->class_room_id)
            ->where('subject_id', $request->subject_id)
            ->first();
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

        return back()->with('error', 'The selected Class and subject has already been assigned for this session');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AssignClassAndSubject  $assignClassAndSubject
     * @return \Illuminate\Http\Response
     */
    public function show(AssignClassAndSubject $assignClassAndSubject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AssignClassAndSubject  $assignClassAndSubject
     * @return \Illuminate\Http\Response
     */
    public function edit(AssignClassAndSubject $assignClassAndSubject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAssignClassAndSubjectRequest  $request
     * @param  \App\Models\AssignClassAndSubject  $assignClassAndSubject
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAssignClassAndSubjectRequest $request, AssignClassAndSubject $assignClassAndSubject)
    {
        // dd($assignClassAndSubject);
        // dd($request->all());
        $currentSession = "2022/2023";
        $alreadyAssigned = AssignClassAndSubject::where('session', $currentSession)
            ->where('class_room_id', $request->class_room_id)
            ->where('subject_id', $request->subject_id)
            ->first();
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AssignClassAndSubject  $assignClassAndSubject
     * @return \Illuminate\Http\Response
     */
    public function destroy(AssignClassAndSubject $assignClassAndSubject)
    {
        //
    }
}
