<?php

namespace App\Http\Controllers\Dashboard;

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
        $agents = Agent::paginate(15);
        $property= Property::all();


        return view('dashboard.agents.index', compact("agents","property"));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agent= Agent::all();


        return view('dashboard.agents.create', compact("agent"));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $roles=["agent_name"=> "required|string",
            "agent_desc"=> "required",
//            "agent_image"=> "required|mimes:jpg,png",
            "agent_phone"=> "required|integer",
            "agent_email"=> "required|email:rfc",
            "agent_fb"=> "required | url",
            "agent_twitter"=> "required | url",
            "agent_insta"=> "required | url",
            "agent_pintrest"=> "required | url",
            "agent_dribble"=> "required | url"];

        $messages=["agent_name.required"=> "Agent name is required",
            "agent_desc.required"=> "Agent description is required",
//            "agent_image.mimes"=> "Agent image should be jpg or png",
            "agent_phone.integer"=> "Agent phone should be integer",
            "agent_email.email"=> "Agent email is invalid",
            "agent_fb.url"=> "Facebook link is invalid",
            "agent_twitter"=> "Twitter link is invalid",
            "agent_insta"=> "Instagram link is invalid",
            "agent_printrest"=> "Pintrest link is invalid",
            "agent_dribble"=> "Dribble link is invalid"];
        $validator = Validator::make($request->all(),$roles);

        if($validator->fails()){
            return  redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $agent= Agent::create([
            'name'=> $request->agent_name,
            'description'=> $request->agent_desc,
            'phone'=> $request->agent_phone,
            'email'=> $request->agent_email,
            'facebookLink' => $request->agent_fb,
            'instagramLink' => $request->agent_insta,
            'pintrestLink' => $request->agent_pintrest,
            'twitterLink' => $request->agent_twitter,
            'dribbleLink' => $request->agent_dribble

        ]);

//        $img= new agent_and_blog_image();

        if($request->hasFile('agent_image'))
        {
            $image=$request->file('agent_image');

            $destinationPath = 'agent_images';
            $filename = time()."_".$image->extension();
            $image->move($destinationPath, $filename);
//            $img->path= $filename;
//            $img->imageable_id= $agent->id;
            $agent->agent_image()->insert(['path'=>$filename,'imageable_type'=>'App\Agent','imageable_id'=>$agent->id]);

        }


        $agent->save();

        return redirect()->route("Dashboard.agents.index")->with("Success","Created Successfully ");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function show(Agent $agent)
    {
        $properties= Property::all();
        $count=$agent->properties()->count();
        return view('dashboard.agents.show',compact('agent', 'count','properties'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function edit(Agent $agent)
    {
        $properties= Property::all();
        return view('dashboard.agents.edit',compact( 'agent','properties'));
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


        $roles=["agent_name"=> "required|string",
            "agent_desc"=> "required",
            "agent_image"=> "required|mimes:jpeg,png,jpg",
            "agent_phone"=> "required|integer",
            "agent_email"=> "required|email:rfc",
            "agent_fb"=> "required | url",
            "agent_twitter"=> "required | url",
            "agent_insta"=> "required | url",
            "agent_pintrest"=> "required | url",
            "agent_dribble"=> "required | url"];

        $messages=["agent_name.required"=> "Agent name is required",
            "agent_desc.required"=> "Agent description is required",
            "agent_image.mimes"=> "Agent image should be jpg or png",
            "agent_phone.integer"=> "Agent phone should be integer",
            "agent_email.email"=> "Agent email is invalid",
            "agent_fb.url"=> "Facebook link is invalid",
            "agent_twitter"=> "Twitter link is invalid",
            "agent_insta"=> "Instagram link is invalid",
            "agent_printrest"=> "Pintrest link is invalid",
            "agent_dribble"=> "Dribble link is invalid"];
        $validator = Validator::make($request->all(),$roles,$messages);

        if($validator->fails()){
            return  redirect()->back()->withErrors($validator->errors())->withInput();
        }


        $agent->name= $request->agent_name;
        $agent->description= $request->agent_desc;
        $agent->phone= $request->agent_phone;
        $agent->email= $request->agent_email;
        $agent->facebookLink = $request->agent_fb;
        $agent->instagramLink = $request->agent_insta;
        $agent->pintrestLink = $request->agent_pintrest;
        $agent->twitterLink = $request->agent_twitter;
        $agent->dribbleLink = $request->agent_dribble;

        if($request->hasFile('agent_image')){
            $image= $request->file('agent_image');
            $destinationPath = 'agent_images';
            $filename = time()."_".$image->extension();
            $image->move($destinationPath, $filename);
            $agent->agent_image()->updateOrCreate(['path'=>$filename]);
        }


        $agent->save();

        return redirect()->route("Dashboard.agents.index")->with("Success","Updated Successfully ");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agent $agent)
    {
        $agent->delete();
        return redirect()->route("Dashboard.agents.index")->with("Success","Deleted Successfully ");
    }
}
