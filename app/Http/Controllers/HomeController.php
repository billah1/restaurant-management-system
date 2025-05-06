<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home(){
        $foods = Food::all();
        return view('home',compact('foods'));
    }

    public function redirects()
    {
        $foods = Food::all();
        $usertype = Auth::user()->usertype;
    
        if ($usertype == '1') {
            return view('admin.admin');
        } else {
            return view('home',compact('foods')); 
        }
    }
    
}
