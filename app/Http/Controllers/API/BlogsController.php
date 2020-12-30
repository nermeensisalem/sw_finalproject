<?php

namespace App\Http\Controllers\API;

use App\agent_and_blog_image;
use App\Author;
use App\Blog;
use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
        $blogs = Blog::all();
        $category= Category::all();
        $author= Author::all();

        $count=$blogs->count();

        return response([
            "status"=> "success",
            "count records"=> $count,
            "data"=> $blogs
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

        $role=["title"=> "required|string",
            "body"=> "required",
            "image"=> "required|mimes:jpg,png",
            "author_id"=> "required|integer",
            "category_id"=> "required|integer",
            "date"=> "required"];


        $messages=[
            "title.string"=> "Blog title is required",
            "body.required"=>"Blog body is required",
//            "image.mimes"=> "Blog image is required",
            "author_id.required"=>"Blog author name is required",
            "category_id.required"=> "Blog category name is required",
            "date.required"=>"Blog date is required"
        ];
        $validator = Validator::make($request->all(),$role,$messages);

        if($validator->fails()){

            return  response([
                "status"=> "error",
                "error"=>$validator->errors()
            ]);
        }

        $blog= Blog::create([
            'title'=> $request->title,
            'body'=>$request->body,
            'author_id'=> $request->author_id,
            'category_id'=> $request->category_id,
            'date'=> $request->date
        ]);


        $img= new agent_and_blog_image();


        if($request->hasFile('image'))
        {
            $image=$request->file('image');

            $destinationPath = 'blog_images';
            $filename = time()."_".$image->extension();
            $image->move($destinationPath, $filename);
            $img->path= $filename;
            $img->imageable_id= $blog->id;
            $blog->blog_image()->save($img);

        }

        $blog->save();


        return response([
            "status"=> "Blog created successfully",
            "blog"=> $blog
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {

        return response([
            "status"=> "success",
            "blog"=> $blog
        ]);
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
        $role=["title"=> "required|string",
            "body"=> "required",
//            "image"=> "required|mimes:jpg,png",
            "author_id"=> "required|integer",
            "category_id"=> "required|integer",
            "date"=> "required"];


        $messages=[
            "title.string"=> "Blog title is required",
            "body.required"=>"Blog body is required",
//            "image.mimes"=> "Blog image is required",
            "author_id.required"=>"Blog author name is required",
            "category_id.required"=> "Blog category name is required",
            "date.required"=>"Blog date is required"
        ];

        $validator = Validator::make($request->all(),$role,$messages);
        if($validator->fails()){

            return  response([
                "status"=> "error",
                "error"=>$validator->errors()
            ]);
        }

        $blog->title= $request->title;
        $blog->body= $request->body;
        $blog->author_id= $request->author_id;
        $blog->category_id= $request->category_id;
        $blog->date= $request->date;




        $img= agent_and_blog_image::all();


        if($request->hasFile('image'))
        {
            $image=$request->file('image');

            $destinationPath = 'blog_images';
            $filename = time()."_".$image->extension();
            $image->move($destinationPath, $filename);
            $img->path= $filename;
            $img->imageable_id= $blog->id;
            $blog->blog_image()->update(['path'=>$img]);

        }

        $blog->save();

//
        return response([
            "status"=> "Blog updated successfully",
            "blog"=> $blog
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $deleteBlog=$blog->delete();
        return response([
            "status"=> "Deleted successfully",
            "blog"=> $deleteBlog
        ]);
    }
}
