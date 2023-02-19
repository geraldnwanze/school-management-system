<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\SchoolProfile;
use Illuminate\Http\Request;

class SchoolProfileController extends Controller
{
    public function createProfile()
    {
        return view('dashboard.school.create');
    }

    public function storeProfile(Request $request)
    {
        // dd($request->all());
        try {
            $store = SchoolProfile::create([
                'reg_no_format' => $request->regNo
            ]);
            return back()->with('success', 'Record successfully created');
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
        }
        
    }

}
