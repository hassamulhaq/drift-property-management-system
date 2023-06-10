<?php

namespace App\Services;

use App\Models\Product\Product;

class ProductService
{

    public function createProduct($data)
    {
        return Product::create([
            'author_id' => auth()->id(),
            'title' => $data['title'],
            'excerpt' => $data['excerpt'] ?? null,
            'slug' => $data['slug'],
            'short_description' => $data['short_description'],
            'description' => $data['description'] ?? '',
            'tags' => $data['tags'],
            'product_number' => $data['product_number'],
            'price' => $data['price'],
            'second_price' => $data['second_price'],
            'price_prefix' => $data['price_prefix'],
            'price_postfix' => $data['price_postfix'],
            'sku' => $data['sku'],
            'status' => $data['status'],
            'comment_status' => $data['comment_status'] ?? Product::PRODUCT_PING_STATUS_OPEN,
            'comment_count' => $data['comment_count'] ?? 0,
            'ping_status' => $data['ping_status'] ?? Product::PRODUCT_COMMENT_STATUS_OPEN,
            'product_password' => $data['product_password'] ?? null,
            'to_ping' => $data['to_ping'] ?? 'none',
            'pinged' => $data['pinged'] ?? 'none',
            'menu_order' => $data['menu_order'] ?? 0,
            'featured' => $data['featured'] ?? Product::IS_FEATURED['false'],
            'type_id' => $data['type_id'] ?? Product::PRODUCT_TYPE_SIMPLE,
            'metadata' => $data['meta_data'] ?? null,
            'created_at_gmt' => now()->toDateTimeString(),
            'updated_at_gmt' => now()->toDateTimeString()
        ]);
    }
}
