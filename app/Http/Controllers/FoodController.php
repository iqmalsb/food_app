<?php

namespace App\Http\Controllers;

use File;
use Storage;
use App\Models\Food;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\FoodRequest;

class FoodController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(Request $request) {        
        if($request->keyword) {
            $foods = Food::query()->where('name','LIKE','%'.$request->keyword.'%')->paginate(3);
        } else {
            $foods = Food::paginate(3);
        }
        
        return view ('food.index', compact('foods'));
    }
    
    public function create(Category $categories) { 
        $categories = Category::all();
        
        return view ('food.create', compact('categories'));
    }

    public function store(FoodRequest $request, Food $food) {
        // Validation Form Request
        $validated = $request->validated();
        //Rename File
        $path = $request->name.'-'.date('Y-m-d').'.'.$request->image->getClientOriginalExtension();
        //Set Storage
        Storage::disk('public')->put($path, File::get($request->image));
        $validated['image'] = basename($path);

        Food::create($validated);

        return to_route('food.index')->with([
            'alert-type' => 'alert-success',
            'alert-message' => 'Food added successfully',
        ]);
    }
    
    public function show(Food $food, Category $categories) {
        $categories = Category::all();
        $categoryname = Category::find($food->category_id);

        return view('food.show', compact('food', 'categories', 'categoryname'));
    }
    
    public function update(Request $request, Food $food) {
        $food->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
        ]);
        
        if($request->hasFile('image')) {
            //Rename File
            $filename = $request->name.'-'.date('Y-m-d').'.'.$request->image->getClientOriginalExtension();
            //Set Storage
            Storage::disk('public')->put($filename,File::get($request->image));
            $food->image = $filename;
        }
            $food->save();

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
