<?php

namespace App\Http\Controllers\Product\Type\Property;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductPropertyStoreRequest;
use App\Models\Global\Collection\Collection;
use App\Models\Product\ProductProperty;
use App\Services\ProductPropertyService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PropertyController extends Controller
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

        return Inertia::render('Products/Types/Properties/Create', [
            'collections' => $collections,
        ])->with(['response' => [
            'success' => true,
            'message' => 'view loaded'
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
