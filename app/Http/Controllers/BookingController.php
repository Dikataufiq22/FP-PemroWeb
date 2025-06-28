<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('booking.index', compact('products'));
    }
}
