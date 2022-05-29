<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        return inertia('Shop/Index', [
            'products' => Product::inRandomOrder()->take(9)->get(),
        ]);
    }
}
