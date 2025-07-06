<?php

namespace App\Http\Controllers;
use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->take(3)->get(); // Example query
        return view('index', compact('products'));
    }
    public function catalog()
    {
        $products = Product::latest()->get(); // Example query
        return view('catalog.index', compact('products'));
    }
    public function show($id)
    {
        $product = Product::with(['reviews.user'])->findOrFail($id);
        return view('catalog.show', compact('product'));
    }
}
