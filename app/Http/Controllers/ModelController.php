<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ModelController extends Controller
{
    public function product(){
        $product = Product::all();
        return view('product', compact('product'));
    }
}
