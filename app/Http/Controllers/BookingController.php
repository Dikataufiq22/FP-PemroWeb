<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Booking; // Assuming you have a Booking model
use App\Models\User; // Assuming you have a Booking model
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        // Pass the items to the view
        $products = Product::all();
        return view('booking.index', compact('products'));
    }


    public function addBooking(Request $request)
    {
        // Validate the incoming request data
        // $validatedData = $request->validate([
        //     'user_id' => auth()->id(),
        //     'products' => 'required|array', // Array of product objects
        //     'products.*.id' => 'required|exists:products,id',
        //     'products.*.name' => 'required|string',
        //     'products.*.price' => 'required|numeric|min:0',
        //     'products.*.quantity' => 'required|integer|min:1',
        //     'start_date' => 'required|date|after_or_equal:today',
        //     'end_date' => 'required|date|after:start_date',
        //     'pickup_method' => 'required|in:pickup,delivery',
        //     'delivery_address' => 'nullable|string|required_if:pickup_method,delivery',
        //     'store_location' => 'nullable|string|required_if:pickup_method,pickup',
        //     'full_name' => 'required|string',
        //     'email' => 'required|email',
        //     'phone' => 'required|string',
        //     'id_number' => 'required|string',
        //     'address' => 'required|string',
        //     'emergency_name' => 'required|string',
        //     'emergency_phone' => 'required|string',
        //     'special_notes' => 'nullable|string',
        //     'status' => 'pending',
        //     'total_price' => 'required|numeric|min:0',
        // ]);
    
        $products = $request->input('products');
    
        // Ensure products is an array
        if (!is_array($products)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid products data. Expected an array.',
            ], 400);
        }
    
        $bookings = [];
    
        // Iterate over the array of products and create a booking for each
        foreach ($products as $product) {
            // Ensure required fields exist in each product
            if (!isset($product['id'], $product['name'], $product['price'], $product['quantity'])) {
                return response()->json([
                    'success' => false,
                    'message' => 'Missing required product fields.',
                ], 400);
            }
    
            $bookingData = [
                'user_id' => auth()->id(),
                'product_id' => $product['id'],
                'product_name' => $product['name'],
                'product_price' => $product['price'],
                'quantity' => $product['quantity'],
                'start_date' => '12-07-2025', // Example date, replace with $request->input('start_date') if needed
                'end_date' => '12-08-2025',
                'pickup_method' => $request->input('pickup_method'),
                'delivery_address' => $request->input('delivery_address'),
                'store_location' => $request->input('store_location'),
                'full_name' => $request->input('full_name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'id_number' => $request->input('id_number'),
                'address' => $request->input('address'),
                'emergency_name' => $request->input('emergency_name'),
                'emergency_phone' => $request->input('emergency_phone'),
                'special_notes' => $request->input('special_notes'),
                'status' => 'pending',
                'total_price' => 12000,
            ];
    
            // Create the booking
            $booking = Booking::create($bookingData);
            $bookings[] = [
                'booking' => $booking,
                'user' => $booking->user,
                'product' => $booking->product,
            ];
        }
    
        // Return a response (e.g., JSON response with all bookings)
        return response()->json([
            'success' => true,
            'message' => 'Bookings created successfully!',
            'bookings' => $bookings,
        ]);
    }
}
