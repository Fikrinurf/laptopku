<?php

namespace App\Http\Controllers\Buyer;

use App\Models\Slider;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{


    public function index()
    {
        $products = Product::all();
        $sliders = Slider::get();
        return view('buyer.index', compact('sliders', 'products'));
    }

    public function show(string $id)
    {
        $product = Product::find($id);
        return view('buyer.detail', compact('product'));
    }
}
