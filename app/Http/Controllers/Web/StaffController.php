<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStaffRequest;
use App\Http\Requests\UpdateStaffRequest;
use App\Models\LGA;
use App\Models\Staff;
use App\Models\State;
use App\Models\User;
use App\Traits\ApiResponses;

class StaffController extends Controller
{
    use ApiResponses;

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
            return $this->success($lgas, 'lga list', 200);
        }else{
            return $this->error('no record was retrieved', 404);
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
        $request->validated();
        try {
            $storeStaffAsUser = User::create([
                'role' => User::STAFF,
                'username' => $request->username,
                'email' => $request->email,
                'password' => $request->password
            ]);
            // dd($storeStaffAsUser);
            $storeStaff = Staff::create([
                'user_id' => $storeStaffAsUser->id,
                'surname' => $request->surname,
                'firstname' => $request->firstname,
                'othername' => $request->othername,
                'email' => $request->email,
                'gender' => $request->gender,
                'phone_number' => $request->phone_number,
                'nationality' => $request->nationality,
                'state_id' => $request->state_id,
                'lga_id' => $request->lga_id,
            ]);

            if($storeStaffAsUser && $storeStaff){
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
