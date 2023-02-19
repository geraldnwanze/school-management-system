<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\ClassRoom;
use App\Models\SchoolProfile;
use App\Models\State;
use App\Models\Student;
use App\Traits\ActiveSession;
use App\Traits\ApiResponses;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    use ActiveSession, ApiResponses;

    public function index()
    {
        $classes = ClassRoom::all();
        return view('dashboard.student.index', compact('classes'));
    }

    public function create()
    {
        /***
         * school have to create reg no format
         * when you create a new student get created reg number format
         * get count of already created students in db + 1 = current reg no.
         * use switch case if count < 9 && !== 0 concat 3 zeros
         * count > 9 && < 100 concat 2 zeros
         * count greater than >= 100 && less than 1000 concat 1 zero
         * replace the "reg no" text with current reg no. in the reg no format selected 
        ***/
        $data['states'] = State::all();
        $data['classes'] = ClassRoom::all();
        $data['year'] = $this->activeYear();
        return view('dashboard.student.create', $data);
    }

    public function regNoFormat(Request $request)
    {
        $format = SchoolProfile::where('id', 1)->first();
        $numOfStudents = Student::count();
        if($numOfStudents >= 0 && $numOfStudents < 9){
            $nextRegNo = "000".$numOfStudents + 1;
            $result = str_replace(['year', 'regNo'], [$request->year, $nextRegNo], $format->reg_no_format);
            return $this->success($result);
        }
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStudentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentRequest $request)
    {
        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStudentRequest  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
}
