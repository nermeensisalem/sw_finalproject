<?php

namespace App\Http\Controllers\API;

use App\Agent;
use App\agent_and_blog_image;
use App\Http\Controllers\Controller;
use App\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AgentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agents = Agent::select('name', 'phone', 'email')
            ->get();;
        $count=$agents->count();

        return response([
            "status"=> "success",
            "count records"=> $count,
            "data"=> $agents
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
        $roles=["name"=> "required|string",
            "description"=> "required",
//            "agent_image"=> "required|mimes:jpg,png",
            "phone"=> "required|integer",
            "email"=> "required|email:rfc",
            "fb"=> "required | url",
            "twitter"=> "required | url",
            "insta"=> "required | url",
            "pintrest"=> "required | url",
            "dribble"=> "required | url"];

        $messages=["name.required"=> "Agent name is required",
            "description.required"=> "Agent description is required",
//            "agent_image.mimes"=> "Agent image should be jpg or png",
            "phone.integer"=> "Agent phone should be integer",
            "email.email"=> "Agent email is invalid",
            "fb.url"=> "Facebook link is invalid",
            "twitter"=> "Twitter link is invalid",
            "insta"=> "Instagram link is invalid",
            "printrest"=> "Pintrest link is invalid",
            "dribble"=> "Dribble link is invalid"];
        $validator = Validator::make($request->all(),$roles);

        if($validator->fails()){

            return  response([
                "status"=> "error",
                "error"=>$validator->errors()
            ]);
        }

        $agent= Agent::create([
            'name'=> $request->name,
            'description'=> $request->description,
            'phone'=> $request->phone,
            'email'=> $request->email,
            'facebookLink' => $request->fb,
            'instagramLink' => $request->insta,
            'pintrestLink' => $request->pintrest,
            'twitterLink' => $request->twitter,
            'dribbleLink' => $request->dribble

        ]);

        $img= new agent_and_blog_image();

        if($request->hasFile('image'))
        {
            $image=$request->file('image');

            $destinationPath = 'agent_images';
            $filename = time()."_".$image->extension();
            $image->move($destinationPath, $filename);
            $img->path= $filename;
            $img->imageable_id= $agent->id;
            $agent->agent_image()->save($img);

        }


        $agent->save();

        return response([
            "status"=> "Agent created successfully",
            "agent"=> $agent
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function show(Agent $agent)
    {

        return response([
            "status"=> "success",
            "agent"=> $agent
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agent $agent)
    {
        $roles=[
            "name"=> "string",
            "description"=> "string",
//            "agent_image"=> "required|mimes:jpg,png",
            "phone"=> "integer",
            "email"=> "email:rfc",
            "fb"=> "url",
            "twitter"=> "url",
            "insta"=> "url",
            "pintrest"=> "url",
            "dribble"=> "url"];

        $messages=["name.required"=> "Agent name is required",
            "description.required"=> "Agent description is required",
//            "agent_image.mimes"=> "Agent image should be jpg or png",
            "phone.integer"=> "Agent phone should be integer",
            "email.email"=> "Agent email is invalid",
            "fb.url"=> "Facebook link is invalid",
            "twitter"=> "Twitter link is invalid",
            "insta"=> "Instagram link is invalid",
            "printrest"=> "Pintrest link is invalid",
            "dribble"=> "Dribble link is invalid"];
        $validator = Validator::make($request->all(),$roles);

        if($validator->fails()){

            return  response([
                "status"=> "error",
                "error"=>$validator->errors()
            ]);
        }

        $agent->name= $request->name;
        $agent->description= $request->description;
        $agent->phone= $request->phone;
        $agent->email= $request->email;
        $agent->facebookLink = $request->fb;
        $agent->instagramLink = $request->insta;
        $agent->pintrestLink = $request->pintrest;
        $agent->twitterLink = $request->twitter;
        $agent->dribbleLink = $request->dribble;


        $img= agent_and_blog_image::all();

        if($request->hasFile('image'))
        {
            $image=$request->file('image');

            $destinationPath = 'agent_images';
            $filename = time()."_".$image->extension();
            $image->move($destinationPath, $filename);
            $img->path= $filename;
            $img->imageable_id= $agent->id;
            $agent->agent_image()->save($img);

        }


        $agent->save();

        return response([
            "status"=> "Agent updated successfully",
            "agent"=> $agent
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agent $agent)
    {
        $deleteAgent=$agent->delete();
        return response([
            "status"=> "Deleted successfully",
            "agent"=> $deleteAgent
        ]);
    }
}
