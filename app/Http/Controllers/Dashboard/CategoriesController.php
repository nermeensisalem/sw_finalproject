<?php

namespace App\Http\Controllers\Dashboard;

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
        $categories= Category::paginate(10);

        //dd($cat->blogs);
//        foreach ($cat->blogs as $b){
//            dd($b);
//        }

        return view('dashboard.categories.index', compact('categories'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.categories.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role=["category_name"=> "required|string"];

        $messages = [ "category_name.required"=> "Category name is required",
            "category_name.string" =>"Category name should be string "];
        $validator = Validator::make($request->all(),$role,$messages);

        if($validator->fails()){
            return  redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $category= new Category();
        $category->name= $request->category_name;

        $category->save();

        return redirect()->route("Dashboard.categories.index")->with("Success","Created Successfully ");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('dashboard.categories.edit',compact( 'category'));

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
        $role=["category_name"=> "required|string"];

        $messages = [ "category_name.required"=> "Category name is required",
            "category_name.string" =>"Category name should be string "];
        $validator = Validator::make($request->all(),$role,$messages);

        if($validator->fails()){
            return  redirect()->back()->withErrors($validator->errors())->withInput();
        }

        $category->name= $request->category_name;

        $category->save();

        return redirect()->route("Dashboard.categories.index")->with("Success","Updated Successfully ");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route("Dashboard.categories.index")->with("Success","Deleted Successfully ");
    }
}
