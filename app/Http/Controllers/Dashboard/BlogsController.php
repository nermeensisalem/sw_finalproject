<?php

namespace App\Http\Controllers\Dashboard;

use App\agent_and_blog_image;
use App\Blog;
use App\Category;
use App\Author;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BlogsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::orderBy("created_at","desc")->paginate(10);
        $category= Category::all();
        $author= Author::all();


        return view("dashboard.blogs.index", compact('blogs','category','author'));
        //$blog->comment;
        //$blog= Blog::find(1);
        //dd($blog->categories);
//        foreach ($blog->comments as $item){
//            dd($item);
//        }
//        foreach ($blog->categories as $item){
//            echo $item ;
//
//        }
//        dd();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $author= Author::all();
        $category= Category::all();

        return view('dashboard.blogs.create', compact('author','category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role=["blog_title"=> "required|string",
            "blog_body"=> "required",
//            "blog_img"=> "required|mimes:jpg,png",
            "blog_authorid"=> "required|integer",
            "blog_categoryid"=> "required|integer",
            "blog_date"=> "required | date"];


        $messages=[
            "blog_title.string"=> "Blog title is required",
            "blog_body.required"=>"Blog body is required",
//            "blog_img.mimes"=> "Blog image is required",
            "blog_authorid.required"=>"Blog author name is required",
            "blog_categoryid.required"=> "Blog category name is required",
            "blog_date.required"=>"Blog date is required"
        ];
        $validator = Validator::make($request->all(),$role,$messages);

        if($validator->fails()){
            return  redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $blog= Blog::create([
            'title'=> $request->blog_title,
            'body'=>$request->blog_body,
            'author_id'=> $request->blog_authorid,
        'category_id'=> $request->blog_categoryid,
            'date'=> $request->blog_date
        ]);

//        $blog= new Blog();
//        dd($blog->id);
//        $blog->title= $request->blog_title;
//        $blog->body= $request->blog_body;
//        $blog->author_id= $request->blog_authorid;
//        $blog->category_id= $request->blog_categoryid;
//        $blog->date= $request->blog_date;

        $img= new agent_and_blog_image();


        if($request->hasFile('blog_image'))
        {
            $image=$request->file('blog_image');

                $destinationPath = 'blog_images';
                $filename = time()."_".$image->extension();
                $image->move($destinationPath, $filename);
                $img->path= $filename;
                $img->imageable_id= $blog->id;
                $blog->blog_image()->save($img);

            }

        $blog->save();

        return redirect()->route("Dashboard.blogs.index")->with("Success","Created Successfully ");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
//        $showBlog= Blog::find($blog);
//        // بدي ارجع قيم الريكورد في الفيو
//        foreach ($showBlog->comments as $comment){
//
//        }
        $author= Author::all();
        $category= Category::all();

        return view('dashboard.blogs.show',compact( 'category','author','blog'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        $author= Author::all();
        $category= Category::all();
        return view('dashboard.blogs.edit',compact( 'blog','author','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
//        dd($request->get('blog_image'));

        $role=["blog_title"=> "required|string",
            "blog_body"=> "required",
            "blog_image"=> "mimes:jpeg,png,jpg",
            "blog_authorid"=> "required|integer",
            "blog_categoryid"=> "required|integer",
            "blog_date"=> "required | date"];


        $messages=[
            "blog_title.string"=> "Blog title is required",
            "blog_body.required"=>"Blog body is required",
            "blog_image.mimes"=> "Blog image should be jpg or png or jpeg",
            "blog_authorid.required"=>"Blog author name is required",
            "blog_categoryid.required"=> "Blog category name is required",
            "blog_date.required"=>"Blog date is required"
        ];
        $validator = Validator::make($request->all(),$role,$messages);

        if($validator->fails()){
            return  redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $blog->title= $request->blog_title;
        $blog->body= $request->blog_body;
        $blog->author_id= $request->blog_authorid;
        $blog->category_id= $request->blog_categoryid;
        $blog->date= $request->blog_date;

//dd($request->file('blog_image'));
        if($request->hasFile('blog_image')){
            $image= $request->file('blog_image');
            $destinationPath = 'blog_images';
            $filename = time()."_".$image->extension();
            $image->move($destinationPath, $filename);
            $blog->blog_image()->update(['path'=>$filename]);
        }


        $blog->save();

        return redirect()->route("Dashboard.blogs.index")->with("Success","Updated Successfully ");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route("Dashboard.blogs.index")->with("Success","Deleted Successfully ");
    }
}
