<?php

namespace App\Http\Controllers;

use App\Models\Chef;
use App\Models\Food;
use App\Models\User;
use App\Models\Reservation;
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


    public function editfood($id){
        $food = Food::find($id);
        return view('admin.editfood',compact('food'));
    }


    public function updatefood(Request $request, $id)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'price' => 'required|numeric',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'description' => 'nullable|string',
    ]);

    $food = Food::findOrFail($id);

    // Handle image upload if new image is provided
    if ($request->hasFile('image')) {
        // Optional: delete old image if it exists
        if ($food->image && file_exists(public_path('uploads/food/' . $food->image))) {
            unlink(public_path('uploads/food/' . $food->image));
        }

        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads/food'), $imageName);
        $food->image = $imageName;
    }

    // Update other fields
    $food->title = $request->title;
    $food->price = $request->price;
    $food->description = $request->description;
    $food->save();

    return redirect()->back()->with('success', 'Food item updated successfully.');
}

public function viewreservation(){
    $reservations = Reservation::all();
    return view('admin.viewreservation',compact('reservations'));
}


public function viewchefs(){
    $chefs = Chef::all();
    return view('admin.chefs',compact('chefs'));
}


public function storechef(Request $request)
{
    $request->validate([
        'name' => 'nullable|string',
        'speciality' => 'nullable|string',
        'image' => 'nullable|image|max:2048',
    ]);

    $chef = new Chef();
    $chef->name = $request->name;
    $chef->speciality = $request->speciality;

    if ($request->hasFile('image')) {
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('chefimages'), $imageName);
        $chef->image = $imageName;
    }

    $chef->save();

    return redirect()->back()->with('success', 'Chef added successfully!');
}

public function deletechef($id){
    $chef = Chef::findOrFail($id);
    $chef->delete();
    return redirect()->back();
}


public function editchef($id){
    $chef = Chef::find($id);
    return view('admin.editchef',compact('chef'));
}


public function updatechef(Request $request, $id)
{
    $chef = Chef::find($id);

    if (!$chef) {
        return redirect()->back()->with('error', 'Chef not found.');
    }

    $chef->name = $request->input('name');
    $chef->speciality = $request->input('speciality');

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('chefimages'), $imageName);
        $chef->image = $imageName;
    }

    $chef->save();

    return redirect()->back()->with('success', 'Chef updated successfully!');
}





    

    


    
}
