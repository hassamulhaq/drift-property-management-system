<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'product_type' => 'required|int',
            'title' => 'required|string|max:200',
            'slug' => 'nullable|alpha_dash|unique:properties,slug',
            'short_description' => 'nullable',
            'sku' => 'required|string|max:200|alpha_dash|unique:products,sku|unique:properties,sku',
            'product_number' => 'nullable|alpha_dash',
            'price' => 'required|numeric',
            'second_price' => 'nullable',
            'price_prefix' => 'nullable',
            'price_postfix' => 'nullable',
            'featured' => 'sometimes|nullable|int',
            'status'  => 'required|int',
            'tags' => 'nullable',
            'categories' => 'nullable|array',
            'categories.*' => 'string|exists:categories,id',
            'collections' => 'nullable|array',
            'collections.*' => 'string|exists:collections,id',
            'attribute' => 'nullable|array',
            'attribute.value.*' => 'filled|string',
            'attribute.key.*' => 'filled|string',
            'thumbnail' => 'nullable',
            'gallery' => 'nullable',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
