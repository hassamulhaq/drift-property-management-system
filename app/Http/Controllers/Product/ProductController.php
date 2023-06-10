<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;
use App\Models\Product\Product;
use App\Services\PropertyService;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function __construct(protected PropertyService $propertyService)
    {
    }

    public function index()
    {
        $products = Product::with(['categories', 'productProperty'])
            ->get();
        //->paginate(25);

        return Inertia::render('Products/Show', [
            'products' => $products,
        ]);
    }

    public function create()
    {

        return Inertia::render('Products/Show', [
            'products' => [],
        ]);
    }

    public function store(ProductStoreRequest $request)
    {
        $response = $this->propertyService->store($request->validated());

        return redirect()->back()->with([
            'response' => $response
        ]);
    }

    public function show(Product $product)
    {
    }

    public function edit(Product $product)
    {
    }

    public function update(Request $request, Product $product)
    {
    }

    public function destroy(Product $product)
    {
        $product->delete();
        $response = ['success' => 'Record Deleted'];

        return redirect()->route('admin.products.index')->with($response);
    }

    public function uniqueSlug(Request $request)
    {
        return SlugService::createSlug(Property::class, 'slug', $request->input('title'), ['unique' => true]);
    }

    public function singleProduct(Product $product)
    {

        #Todo Single Product...
        return Inertia::render('Frontend/Shop/SingleProduct', ['product' => $product->load('productProperty')]);
    }
}
