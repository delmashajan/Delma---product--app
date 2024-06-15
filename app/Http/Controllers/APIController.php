<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class APIController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return response()->json(['message'=>'success', 'categories'=>$categories]);
    }

    public function index_product($id)
    {
        $products = Product::where('category_id', $id)->get();
    
        return response()->json(['message' => 'success', 'products' => $products]);
    }
}
