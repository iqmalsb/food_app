<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;
use Storage;
use File;

class FoodController extends Controller
{
    public function index() {
        $foods = Food::all();

        return view ('food.index', compact('foods'));
    }

    public function create() { 
        return view ('food.create');
    }

    public function store(Request $request, Food $food) {
        if($request->hasFile('image')) {
            //Rename File
            $filename = $request->name.'-'.date('Y-m-d').'.'.$request->image->getClientOriginalExtension();
            dd($filename);
            //Set Storage
            Storage::disk('public')->put($filename,File::get($request->image));
            $food->image = $filename;
        }
        $food->create([
            'name' => $request->name,
            'description' => $request->description,
            // 'image' => $request->image,
            'image' => $filename,
        ]);
        return to_route('food.index');
    }
    
    public function show(Request $request, Food $food) {
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
        return to_route('food.index');
    }
}
