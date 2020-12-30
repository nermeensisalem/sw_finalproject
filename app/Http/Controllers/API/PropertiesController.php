<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PropertiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $properties= Property::select('id','name','location')->where("price",">",1000)->get();
        $count= count($properties);

        return response([
           "status"=> "success",
           "count"=> $count,
           "data"=> $properties
        ]);

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $role=["name"=> "required|string",
            "description"=> "required",
            "image"=> "required|mimes:jpg,png",
            "type_id"=> "required|integer",
            "area"=> "required|integer",
            "beds"=> "required |integer",
            "baths"=> "required|integer",
            "garage"=> "required|integer",
            "location"=> "required",
            "status"=> "required|string",
            "amenity_id"=> "required|integer",
            "price"=> "required|numeric",
            "agent_id"=> "required|integer"];



        $validator = Validator::make($request->all(),$role);


        if($validator->fails()){
            return  response([
                "status"=> "failed adding new property",
                "errors"=> $validator->errors()
            ]);
        }

        $property= Property::create([
            'name'=> $request->name,
            'description'=> $request->description,
//        $property->image= $fileName;
            'type_id'=> $request->type_id,
            'area'=> $request->area,
            'beds'=> $request->beds,
            'baths' => $request->baths,
            'garage' => $request->garage,
            'location' => $request->location,
            'status' => $request->status,
            'price' => $request->price,
            'agent_id' => $request->agent_id
        ]);

        $images=array();
        if($imgs= $request->file('image'))
        {

//            foreach($imgs as $image)
//            {
                $destinationPath = 'property_images';
                $filename = time().".".$imgs->extension();
                $imgs->move($destinationPath, $filename);
//                $images[]= $filename;
            }
//            dd($filename);


            $property->property_images()->insert(['path'=>$imgs, 'property_id'=>$property->id]);

            $property->save();

        return response([
            "success" => "Property created successfully",
            "property"=> $property
        ]);
        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        return response([
            "status"=> "success",
            "property"=> $property
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Property $property)
    {
        $role=["name"=> "string",
            "description"=> "string",
//            "image"=> "required|mimes:jpg,png",
            "type_id"=> "integer",
            "area"=> "integer",
            "beds"=> "integer",
            "baths"=> "integer",
            "garage"=> "integer",
            "location"=> "string",
            "status"=> "string",
            "amenity_id"=> "integer",
            "price"=> "numeric",
            "agent_id"=> "integer"];



        $validator = Validator::make($request->all(),$role);


        if($validator->fails()){
            return  response([
                "status"=> "failed adding new property",
                "errors"=> $validator->errors()
            ]);
        }

        $property->name= $request->name;
        $property->description= $request->description;
//      $property->image= $fileName;
        $property->type_id= $request->type_id;
        $property->area= $request->area;
        $property->beds= $request->beds;
        $property->baths = $request->baths;
        $property->garage = $request->garage;
        $property->location = $request->location;
        $property->status = $request->status;
        $property->price = $request->price;
        $property->agent_id = $request->agent_id;


        $images=array();
        if($imgs= $request->file('image'))
        {

            foreach($imgs as $image)
            {
                $destinationPath = 'property_images';
                $filename = time().".".$image->extension();
                $image->move($destinationPath, $filename);
                $images[]= $filename;
                dd($images);
            }
            $property->property_images()->update(['path'=>implode("|",$images), 'property_id'=>$property->id]);
        }

        $property->save();

        return response([
            "success" => "Property created successfully",
            "property"=> $property
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        $deleteProperty=$property->delete();
        return response([
            "status"=> "Deleted successfully",
            "property"=> $deleteProperty
        ]);
    }
}
