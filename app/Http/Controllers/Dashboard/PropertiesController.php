<?php

namespace App\Http\Controllers\Dashboard;

use App\Agent;
use App\Amenities;
use App\Amenity_property;
use App\Http\Controllers\Controller;
use App\images_property;
use App\Property;
use App\property_image;
use App\property_type;
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
        $properties= Property::paginate(10);
        $type= property_type::all();
        $img= images_property::all();


        return view("dashboard.properties.index", compact("properties","type","img"));

        //$property=Property::find(2);
//        dd($property->images);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agent= Agent::all();
        $type= property_type::all();
        $amenities= Amenities::all();
        return view("dashboard.properties.create", compact('agent','type','amenities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role=["property_name"=> "required|string",
            "property_desc"=> "required",
//            "fileName"=> "required|mimes:jpg,png",
            "type_id"=> "required|integer",
            "property_area"=> "required|integer",
            "property_beds"=> "required |integer",
            "property_baths"=> "required|integer",
            "property_garage"=> "required|integer",
            "property_location"=> "required",
            "property_status"=> "required|string",
            "amenity_id"    => "required|array|min:1",
            "amenity_id.*"  => "required|string|distinct|min:1",
            "property_price"=> "required|numeric",
            "agent_id"=> "required|integer"];

        $messages=[
            "property_name.required"=> "Property name is required",
            "property_desc.required"=> "Property description is required",
//            "fileName.required"=> "Property image is required",
            "type_id.required"=> "type is required",
            "property_area.integer"=> "Property area should be integer",
            "property_beds.integer"=> "Property beds should be integer",
            "property_baths.integer"=> "Property baths should be integer",
            "property_garage.integer"=> "Property garage should be integer",
            "property_location.required"=> "Property location is required",
            "property_status.string"=> "Property status should be string",
            "aminity_id.required"=> "You should select one aminity at least",
            "property_price.required"=> "Property price is required",
            "agent_id.required"=> "Agent name is required"];
        $validator = Validator::make($request->all(),$role,$messages);

        if($validator->fails()){
            return  redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $property= Property::create([
            'name'=> $request->property_name,
            'description'=> $request->property_desc,
//        $property->image= $fileName;
            'type_id'=> $request->type_id,
            'area'=> $request->property_area,
            'beds'=> $request->property_beds,
            'baths' => $request->property_baths,
            'garage' => $request->property_garage,
            'location' => $request->property_location,
            'status' => $request->property_status,
            'price' => $request->property_price,
            'agent_id' => $request->agent_id
        ]);

        $pro_am= new Amenity_property();
        foreach ($request->amenity_id as $amenity){
            $pro_am->amenity_id= $amenity;
            $pro_am->property_id= $property->id;
            $pro_am->insert(['amenity_id'=>$pro_am->amenity_id, 'property_id'=>$pro_am->property_id]);
        }

//        dd($request->all());
        $images=array();
        $imgs= $request->file('property_img');
        if($imgs != null)
        {

            foreach($imgs as $image)
            {
                $destinationPath = 'property_images';
                $filename = time().".".$image->extension();
                $image->move($destinationPath, $filename);
                $images[]= $filename;
            }

            $property->property_images()->store(['path'=>implode("|",$images), 'property_id'=>$property->id]);
//            Session::put('message', 'Image upload successfully');
        }

        $property->save();

        return redirect()->route("Dashboard.properties.index")->with("Success","Created Successfully ");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        // بتجيب البروبرتي مع الامينييتيز تعتها
//        dd($property->amenities()->get());
//        // بجيب الامينيتي لاول بروبرتي
//        $gett= Property::first()->amenities;
//        dd($gett);


        $type= property_type::all();
        $agent= Agent::all();
        $img= images_property::all();
        $path=[];
        foreach ($img as $image){
            if($image->property_id == $property->id){
                array_push($path,$image->path);
            }
        }
//        dd($property->property_images());



        return view('dashboard.properties.show',compact('property', 'agent','type','path'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        $type= property_type::all();
        $agent= Agent::all();
        $amenities= Amenities::all();
        $property_images= images_property::all();
        $id= $property->id;
        $property_amenities=Amenity_property::all()->where("property_id","=","$id");
        return view('dashboard.properties.edit',compact('property', 'agent','type','amenities',
            'property_images','property_amenities'));

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

        $role=["property_name"=> "required|string",
            "property_desc"=> "required",
//            "fileName"=> "required|mimes:jpg,png",
            "type_id"=> "required|integer",
            "property_area"=> "required|integer",
            "property_beds"=> "required |integer",
            "property_baths"=> "required|integer",
            "property_garage"=> "required|integer",
            "property_location"=> "required",
            "property_status"=> "required|string",
            "amenity_id"    => "required|array|min:1",
            "amenity_id.*"  => "required|string|distinct|min:1",
            "property_price"=> "required|numeric",
            "agent_id"=> "required|integer"];

        $messages=[
            "property_name.required"=> "Property name is required",
            "property_desc.required"=> "Property description is required",
//            "fileName.required"=> "Property image is required",
            "type_id.required"=> "type is required",
            "property_area.integer"=> "Property area should be integer",
            "property_beds.integer"=> "Property beds should be integer",
            "property_baths.integer"=> "Property baths should be integer",
            "property_garage.integer"=> "Property garage should be integer",
            "property_location.required"=> "Property location is required",
            "property_status.string"=> "Property status should be string",
            "amenity_id.required"=> "You should select one aminity at least",
            "property_price.required"=> "Property price is required",
            "agent_id.required"=> "Agent name is required"];
        $validator = Validator::make($request->all(),$role,$messages);

        if($validator->fails()){
            return  redirect()->back()->withErrors($validator->errors())->withInput();
        }


        $property->name= $request->property_name;
        $property->description= $request->property_desc;
//        $property->image= $fileName;
        $property->type_id= $request->type_id;
        $property->area= $request->property_area;
        $property->beds= $request->property_beds;
        $property->baths = $request->property_baths;
        $property->garage = $request->property_garage;
        $property->location = $request->property_location;
        $property->status = $request->property_status;


        $property->amenities()->sync($request->amenity_id);

//        foreach ($request->amenity_id as $amenity){ //[5,6,8]
//            $property->amenities()->sync($amenity);
//
//        }

        $property->price = $request->property_price;
        $property->agent_id = $request->agent_id;

        if($request->hasFile('property_img'))
        {
            foreach($request->file('property_img') as $image)
            {
//                dd($request->file('property_img'));
                $destinationPath = 'property_images';
                $filename = time().".".$image->extension();
                $image->move($destinationPath, $filename);

                $property->property_images()->updateOrCreate(['path'=>$filename, 'property_id'=>$property->id]);

            }

        }
        $property->save();

        return redirect()->route("Dashboard.properties.index")->with("Success","Updated Successfully ");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        $property->delete();
        return redirect()->route("Dashboard.properties.index")->with("Success","Deleted Successfully ");

    }
}
