<?php

namespace App\Http\Controllers;

use App\Models\TelephoneType;
use Illuminate\Http\Request;

class TelephoneTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return TelephoneType[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     */
    public function index()
    {
        return TelephoneType::all();
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TelephoneType  $telephoneType
     * @return \Illuminate\Http\Response
     */
    public function show(TelephoneType $telephoneType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TelephoneType  $telephoneType
     * @return \Illuminate\Http\Response
     */
    public function edit(TelephoneType $telephoneType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TelephoneType  $telephoneType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TelephoneType $telephoneType)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TelephoneType  $telephoneType
     * @return \Illuminate\Http\Response
     */
    public function destroy(TelephoneType $telephoneType)
    {
        //
    }
}
