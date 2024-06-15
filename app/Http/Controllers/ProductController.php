<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('index_product', ['products'=>$products]);
    }

    public function addToCart(Request $request, $id)
    {
        $cart = session()->get('cart', []);
        $cart[$id] = $id;
        session()->put('cart', $cart);

        return response()->json(['success' => true]);
    }

    public function getCartItems()
    {
        $cart = Session()->get('cart',[]);
        $cartItems = Product::whereIn('id',$cart)->get();

        return response()->json(['cartItems'=>$cartItems]);
    }
}
