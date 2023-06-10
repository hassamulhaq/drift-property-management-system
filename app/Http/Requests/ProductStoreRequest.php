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
            'description' => 'nullable',
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
            'size' => 'nullable',
            'size_prefix' => 'nullable',
            'land' => 'nullable',
            'land_postfix' => 'nullable',
            'bedrooms' => 'nullable',
            'garage' => 'nullable',
            'garage_size' => 'nullable',
            'year' => 'nullable',
            'map' => 'nullable',
            'map_address' => 'nullable',
            'address' => 'nullable',
            'zip' => 'nullable',
            'logged_in_to_view' => 'nullable',
            'disclaimer' => 'nullable',
            'virtual_tour' => 'nullable',
            'agent_display_option' => 'nullable',
            'attachments' => 'nullable',
            'private_note' => 'nullable',
            'energy_class' => 'nullable',
            'energy_global_index' => 'nullable',
            'renewable_energy_global_index' => 'nullable',
            'energy_performance' => 'nullable',
            'epc_current_rating' => 'nullable',
            'epc_potential_rating' => 'nullable',
            'rop_plan_duration' => 'required|int',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
