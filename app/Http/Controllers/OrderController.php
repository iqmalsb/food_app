<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function index()
    {
        // dd("something");
        return view('orders.index');
    }
    
    public function menu(Request $request)
    {
        if($request->keyword) {
            $menu = Food::query()
            ->where('name','LIKE','%'.$request->keyword.'%')
            ->orWhere('description','LIKE','%'.$request->keyword.'%')
            ->get();
        } else {
            $menu = Food::all();
        }
        return view('orders.menu', compact('menu'));
    }

    // Maybe not required
    public function create()
    {
        return view('orders.create');
    }

    public function store(Request $request, Order $order)
    {
        $order->create([
            'is_paid' => $request->is_paid,
            'is_dine_in' => $request->is_dine_in,
            'has_cutlery' => $request->has_cutlery,
        ]);
    }

    public function viewCart(Request $request)
    {
        $cartItems = $request->session('cart');
        dd(session('cartItems'));
        // return view('orders.viewcart', array('cartItems'));
    }

    public function insertItemToCart(Request $request)
    {
        // $request->session()->push($request->cartID, [
        //     'food_id' => $request->food_id,
        //     'food_name' => $request->food_name,
        //     'additional_request' => $request->additional_request
        // ]);

        // // $request->session()->flush();
        // // $data->save();
        // // return response()->json(['success' => 'Post created successfully.']);

        // // $sessionStorageData = $request->sessionStorageData;
        // // dd($sessionStorageData);
        // dd($request);

        // return redirect()->action([OrderController::class, 'menu'])->with([
        //     'alert-type' => 'alert-success',
        //     'alert-message' => 'Order was successfully created',
        // ]);

        Session::put('cartItems', 
        [
            'food_id' => $request->food_id, 
            'food_name' => $request->food_name, 
            'description' => $request->description, 
            'additional_request' => $request->additional_request, 
        ]);
        // $request->session()->push('cart');
        dd(session('cartItems'));
    }

    public function removeItemFromCart(Request $request)
    {

    }

    public function editItemInsideCart()
    {

    }

    public function checkoutCart() 
    {

    }
}
