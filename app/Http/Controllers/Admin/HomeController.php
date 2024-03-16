<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        // dd(999);
        $x = 111;
        return view('admin.welcome_template',compact('x'));
    }
}
