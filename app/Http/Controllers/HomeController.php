<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Chef;
use App\Models\Food;
use App\Models\Order;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home(){
        $foods = Food::all();
        $chefs = Chef::all();
        return view('home',compact('foods','chefs'));
    }

    public function redirects()
    {
        $foods = Food::all();
        $chefs = Chef::all();
        $usertype = Auth::user()->usertype;
    
        if ($usertype == '1') {
            return view('admin.admin');
        } else {
            $user_id = Auth::id();
            $count = Cart::where('user_id',$user_id)->count();
            return view('home',compact('foods','chefs','count')); 
        }
    }

    public function reservation(Request $request)
{
    
    $request->validate([
        'name'    => 'nullable|string|max:255',
        'email'   => 'nullable|email|max:255',
        'phone'   => 'nullable|string|max:20',
        'guest'   => 'nullable|string|max:10',
        'date'    => 'nullable|string|max:50',
        'time'    => 'nullable|string|max:50',
        'message' => 'nullable|string|max:1000',
    ]);

    // Store reservation
    $reservation = new Reservation();
    $reservation->name = $request->name;
    $reservation->email = $request->email;
    $reservation->phone = $request->phone;
    $reservation->guest = $request->guest;
    $reservation->date = $request->date;
    $reservation->time = $request->time;
    $reservation->message = $request->message;
    $reservation->save();

    return redirect()->back()->with('success', 'Reservation saved successfully.');
}


public function addToCart(Request $request, $id)
{
    if (Auth::check()) {
        $user_id = Auth::id();

        // Optional: Check if product exists
        $food = Food::findOrFail($id);

        // Store in cart
        $cart = new Cart();
        $cart->user_id = $user_id;
        $cart->food_id = $id;
        $cart->quantity = $request->input('quantity', 1); 
        $cart->save();

        return redirect()->back()->with('success', 'Product added to cart.');
    } else {
        return redirect('/login')->with('error', 'You must be logged in to add to cart.');
    }
}


public function showCart(Request $request,$id){
    $count = Cart::where('user_id',$id)->count();
    $cartitems = Cart::select('*')->where('user_id','=',$id)->get();
    $carts = Cart::where('user_id',$id)->join('food','carts.food_id','=','food.id')->get();
    return view('showcart',compact('count','carts','cartitems'));
}

public function remove(Request $request,$id){
    $cart = Cart::findOrFail($id);
    $cart->delete();
    return redirect()->back();
}

public function orderconfirm(Request $request){
    foreach ($request->foodname as $key => $foodname) {
        Order::create([
            'foodname' => $foodname,
            'price'    => $request->price[$key],
            'quantity' => $request->quantity[$key],
            'name'     => $request->name,
            'phone'    => $request->phone,
            'address'  => $request->address,
        ]);

    }
}
    
}
