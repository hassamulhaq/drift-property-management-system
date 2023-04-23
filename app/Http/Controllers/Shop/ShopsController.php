<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Product\Product;
use App\Models\Shop\Shop;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ShopsController extends Controller
{
    public function index()
    {
        $products = Product::with(['categories', 'productProperty'])
            //->get()
        ->paginate(25);

        return Inertia::render('Frontend/Shop/Shop', [
            'products' => $products,
        ]);
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show(Shop $shop)
    {
    }

    public function edit(Shop $shop)
    {
    }

    public function update(Request $request, Shop $shop)
    {
    }

    public function destroy(Shop $shop)
    {
    }
}
