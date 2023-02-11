<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStaffRequest;
use App\Http\Requests\UpdateStaffRequest;
use App\Models\LGA;
use App\Models\Staff;
use App\Models\State;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['staffs'] = Staff::orderBy('id', 'DESC')->get();
        return view('dashboard.staff.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['states'] = State::all();
        // $data['lga'] = ;
        return view('dashboard.staff.create', $data);
    }

    public function getLGA($state)
    {
        $lgas = LGA::where('state_id', $state)->get();
        if(count($lgas) > 0){
            return response()->json($this->successResponse('successfull', '200', $lgas));
        }else{
            return response()->json($this->failureResponse("no record was retrieved", 404, ''));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStaffRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStaffRequest $request)
    {
        // $request->validated();
        try {
            $storeStaff = Staff::create($request->validated());
            if($storeStaff){
                return back()->with('success', 'You successfully created new staff');
            }
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function show(Staff $staff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function edit(Staff $staff)
    {
        $states = State::all();
        $lgas = LGA::where('state_id', $staff->state_id)->get();
        return view('dashboard.staff.edit', compact('staff', 'states', 'lgas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStaffRequest  $request
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStaffRequest $request, Staff $staff)
    {
        // dd($request->all());
        try {
            $updateStaff = $staff->update($request->validated());
            if($updateStaff){
                return redirect(route('dashboard.staff.index'))->with('success', 'You successfully updated staff records');
            }
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function destroy(Staff $staff)
    {
        try {
            if(!$staff->delete()){
                return back()->with('error', "Staff could not be deleted");
            }
            return back()->with('success', 'Staff was deleted successfully');
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
        }
    }
}
