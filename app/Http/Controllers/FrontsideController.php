<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontsideController extends Controller
{
    public function showHome(){
        return view('frontside.home');
    }

    public function showAbout(){
        return view('frontside.about');
    }

    public function showProperty(){
        return view('frontside.property');
    }

    public function showSingleProperty(){
        return view('frontside.singleProperty');
    }

    public function showAgent(){
        return view('frontside.agent');
    }

    public function showSingleAgent(){
        return view('frontside.singleAgent');
    }

    public function showBlog(){
        return view('frontside.blog');
    }

    public function showSingleBlog(){
        return view('frontside.singleBlog');
    }

    public function showContact(){
        return view('frontside.contact');
    }



}
