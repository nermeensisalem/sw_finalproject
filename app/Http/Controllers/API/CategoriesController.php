<?php

namespace App\Http\Controllers\API;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories= Category::all();
        $count=$categories->count();

        return response([
           "status"=> "success",
           "count records"=> $count,
           "data"=> $categories
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

        $role=["name"=> "required|string"];

        $messages = [ "name.required"=> "Category name is required",
            "name.string" =>"Category name should be string "];

        $validator = Validator::make($request->all(),$role,$messages);

        if($validator->fails()){
            return  response([
                "status"=> "error",
                "error"=>$validator->errors()
            ]);
        }
        $category= new Category();
        $category->name= $request->name;

        $category->save();

        return response([
            "status"=> "Category created successfully",
            "category"=> $category,
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return response([
            "status"=> "success",
            "data"=> $category,
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $role=["name"=> "required"];

        $messages = [ "name.required"=> "Category name is required"];
        $validator = Validator::make($request->all(),$role,$messages);
        if($validator->fails()){

            return  response([
                "status"=> "error",
                "error"=>$validator->errors()
            ]);
        }

//        $category= Category::update([
//            'name'=> $request->name
//        ]);
        $category->name= $request->name;

        $category->save();

        return response([
            "status"=> "Category updated successfully",
            "category"=> $category
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $deleteCategory=$category->delete();
        return response([
            "status"=> "Deleted successfully",
            "category"=> $deleteCategory
        ]);




    }
}
