<?php

namespace App\Http\Controllers\Product\Type\Property;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductPropertyStoreRequest;
use App\Models\Global\Collection\Collection;
use App\Models\Product\Type\Property;
use App\Services\PropertyService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PropertyController extends Controller
{
    public function __construct(protected PropertyService $propertyService)
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
        $response = $this->propertyService->store($request->validated());

        return redirect()->back()->with([
            'response' => $response
        ]);
    }

    public function show(Property $property)
    {
    }

    public function edit(Property $property)
    {
    }

    public function update(Request $request, Property $property)
    {
    }

    public function destroy(Property $property)
    {
    }
}
