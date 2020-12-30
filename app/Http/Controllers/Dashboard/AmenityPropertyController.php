<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\amenity_property;
use Illuminate\Http\Request;

class AmenityPropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $amenity= amenity_property::all();
//        return
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
     * @param  \App\amenity_property  $amenity_property
     * @return \Illuminate\Http\Response
     */
    public function show(amenity_property $amenity_property)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\amenity_property  $amenity_property
     * @return \Illuminate\Http\Response
     */
    public function edit(amenity_property $amenity_property)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\amenity_property  $amenity_property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, amenity_property $amenity_property)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\amenity_property  $amenity_property
     * @return \Illuminate\Http\Response
     */
    public function destroy(amenity_property $amenity_property)
    {
        //
    }
}
