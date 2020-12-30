<?php

namespace App\Http\Controllers;

use App\property_type;
use Illuminate\Http\Request;

class PropertyTypeColntroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $type= property_type::all();

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
     * @param  \App\property_type  $property_type
     * @return \Illuminate\Http\Response
     */
    public function show(property_type $property_type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\property_type  $property_type
     * @return \Illuminate\Http\Response
     */
    public function edit(property_type $property_type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\property_type  $property_type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, property_type $property_type)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\property_type  $property_type
     * @return \Illuminate\Http\Response
     */
    public function destroy(property_type $property_type)
    {
        //
    }
}
