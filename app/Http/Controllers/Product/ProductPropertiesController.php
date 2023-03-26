<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductPropertyStoreRequest;
use App\Models\Global\Collection\Collection;
use App\Models\Product\ProductProperty;
use App\Services\ProductPropertyService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductPropertiesController extends Controller
{
    public function __construct(protected ProductPropertyService $productPropertyService)
    {
    }

    public function index()
    {

    }

    public function create()
    {
        $collections = Collection::all();

        return Inertia::render('Products/Property/Create', [
            'collections' => $collections,
        ])->with(['response' => [
            'success' => true,
            'message' => ''
        ]]);
    }

    public function store(ProductPropertyStoreRequest $request)
    {
        $response = $this->productPropertyService->store($request->validated());

        return redirect()->back()->with([
            'response' => $response
        ]);
    }

    public function show(ProductProperty $productProperty)
    {
    }

    public function edit(ProductProperty $productProperty)
    {
    }

    public function update(Request $request, ProductProperty $productProperty)
    {
    }

    public function destroy(ProductProperty $productProperty)
    {
    }
}
