<?php

namespace App\Http\Controllers;

use File;
use Storage;
use App\Models\Food;
use Illuminate\Http\Request;
use App\Http\Requests\FoodRequest;

class FoodController extends Controller
{
    public function index() {
        $foods = Food::paginate(3);

        return view ('food.index', compact('foods'));
    }

    public function create() { 
        return view ('food.create');
    }

    public function store(FoodRequest $request, Food $food) {
        if($request->hasFile('image')) {
            //Rename File
            $filename = $request->name.'-'.date('Y-m-d').'.'.$request->image->getClientOriginalExtension();
            //Set Storage
            Storage::disk('public')->put($filename,File::get($request->image));
            $food->image = $filename;
        }
        $food->create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $filename,
        ]);
        return to_route('food.index')->with([
            'alert-type' => 'alert-success',
            'alert-message' => 'Food added successfully',
        ]);
    }
    
    public function show(Food $food) {
        return view('food.show', compact('food'));
    }
    
    public function update(Request $request, Food $food) {
        $food->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        
        if($request->hasFile('image')) {
            //Rename File
            $filename = $request->name.'-'.date('Y-m-d').'.'.$request->image->getClientOriginalExtension();
            //Set Storage
            Storage::disk('public')->put($filename,File::get($request->image));
            $food->image = $filename;

            $food->image = $filename;
            $food->save();
        }
        return to_route('food.index')->with([
            'alert-type' => 'alert-success',
            'alert-message' => 'Food updated successfully',
        ]);
    }

    public function delete (Food $food) {
        $food->delete();

        return to_route('food.index')->with([
            'alert-type' => 'alert-danger',
            'alert-message' => 'Food deleted successfully',
        ]);
    }
}
