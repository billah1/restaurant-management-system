<?php

namespace App\Http\Controllers;

use App\Models\Food;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function user(){
        $users = User::all();
        return view('admin.users',compact('users'));
    }


    public function deleteUser($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back();
    }


    public function foodMenu(){
        $foods = Food::all();
        return view('admin.foodmenu',compact('foods'));
    }


    public function storeFood(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
        ]);
    
        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/food'), $imageName);
        }
    
        Food::create([
            'title' => $request->title,
            'price' => $request->price,
            'image' => $imageName,
            'description' => $request->description,
        ]);
    
        return redirect()->back()->with('success', 'Food item created successfully.');
    }


    public function deletefood($id){
        $food = Food::findOrFail($id);
        $food->delete();
        return redirect()->back();
    }
    

    


    
}
