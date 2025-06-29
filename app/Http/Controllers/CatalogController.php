<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CatalogController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        // Pencarian
        if ($search = $request->input('search')) {
            $query->where('name', 'like', "%$search%");
        }

        // Filter Kategori
        if ($categories = $request->input('category')) {
            $query->whereIn('category', $categories);
        }

        // Filter Harga (Rupiah)
        if ($prices = $request->input('price_range')) {
            $query->where(function ($q) use ($prices) {
                foreach ($prices as $range) {
                    if ($range == '1000-5000') {
                        $q->orWhereBetween('price', [1000, 5000]);
                    } elseif ($range == '6000-10000') {
                        $q->orWhereBetween('price', [6000, 10000]);
                    } elseif ($range == '11000-20000') {
                        $q->orWhereBetween('price', [11000, 20000]);
                    } elseif ($range == '20000+') {
                        $q->orWhere('price', '>', 20000);
                    }
                }
            });
        }

        // Filter Brand
        if ($brands = $request->input('brand')) {
            $query->whereIn('brand', $brands);
        }

        // Filter Status
        if ($availability = $request->input('availability')) {
            $query->whereIn('status', $availability);
        }

        // Filter Urutan
        switch ($request->input('sort')) {
            case 'Harga Terendah':
                $query->orderBy('price', 'asc');
                break;
            case 'Harga Tertinggi':
                $query->orderBy('price', 'desc');
                break;
            case 'Nama A-Z':
                $query->orderBy('name', 'asc');
                break;
            case 'Terbaru':
                $query->orderBy('created_at', 'desc');
                break;
        }

        $products = $query->paginate(9);

        return view('catalog.index', compact('products'));
    }
}
