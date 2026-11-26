<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\Controller;

class PublicController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->latest()->get();

        $categories = Category::withCount('products')->get();

        return view('public.index', compact('products', 'categories'));
    }

    public function show(Product $product)
    {
        $product->load('category');

        return view('public.detail', compact('product'));
    }
}