<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index(Request $request) {
        if($request->keyword) {
            $categories = Category::query()->where('name','LIKE','%'.$request->keyword.'%')->paginate(3);
        } else {
            $categories = Category::all();
        }

        return view('categories.index', compact('categories'));
    }

    public function create () {
        return view('categories.create');
    }

    public function store (CategoryRequest $request, Category $category) {
        if($request->hasFile('image')) {
            //Rename File
            $filename = $request->name.'-'.date('Y-m-d').'.'.$request->image->getClientOriginalExtension();
            //Set Storage
            Storage::disk('public')->put($filename,File::get($request->image));
            $category->image = $filename;
        }

        Category::create($request->validated());

        return to_route('categories.index')->with([
            'alert-type' => 'alert-success',
            'alert-message' => 'Category added successfully',
        ]);
    }

    public function show(Category $category) {
        return view('categories.show', compact('category'));
    }

    public function update (Request $request, Category $category) {
        $category->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        
        if($request->hasFile('image')) {
            //Rename File
            $filename = $request->name.'-'.date('Y-m-d').'.'.$request->image->getClientOriginalExtension();
            //Set Storage
            Storage::disk('public')->put($filename,File::get($request->image));
            $category->image = $filename;

            $category->image = $filename;
            $category->save();
        }
        
        return to_route('categories.index')->with([
            'alert-type' => 'alert-success',
            'alert-message' => 'Categories updated successfully',
        ]);
    }

    public function delete (Category $category) {
        $category->delete();

        return to_route('categories.index')->with([
            'alert-type' => 'alert-danger',
            'alert-message' => 'Category deleted successfully',
        ]);

    }
}
