<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSuperAdminRequest;
use App\Http\Requests\UpdateSuperAdminRequest;
use App\Models\SuperAdmin;

class SuperAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.superadmin.index');
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
     * @param  \App\Http\Requests\StoreSuperAdminRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSuperAdminRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SuperAdmin  $superAdmin
     * @return \Illuminate\Http\Response
     */
    public function show(SuperAdmin $superAdmin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SuperAdmin  $superAdmin
     * @return \Illuminate\Http\Response
     */
    public function edit(SuperAdmin $superAdmin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSuperAdminRequest  $request
     * @param  \App\Models\SuperAdmin  $superAdmin
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSuperAdminRequest $request, SuperAdmin $superAdmin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SuperAdmin  $superAdmin
     * @return \Illuminate\Http\Response
     */
    public function destroy(SuperAdmin $superAdmin)
    {
        //
    }
}
