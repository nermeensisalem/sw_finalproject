<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //هي المسؤؤولة عن استقبال ال request
    public function index(){
        return view('dashboard/home');
    }


}