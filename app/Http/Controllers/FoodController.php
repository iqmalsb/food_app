<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index() {
        $foods = Food::all();

        return view ('food.index', compact('foods'));
    }

    public function create() { 
        return view ('food.create');
    }

    public function store(Request $request) {
        Food::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $request->image,
        ]);
        return to_route('food.index');
    }

    public function show(Request $request, Food $food) {
        return view('food.show', compact('food'));
    }
}
