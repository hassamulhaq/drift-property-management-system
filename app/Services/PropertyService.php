<?php

namespace App\Services;

use App\Helpers\Constant;
use App\Models\Product\ProductAttribute\ProductAttribute;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class PropertyService
{
    public function __construct(protected ProductService $productService)
    {
    }

    public function store($request): array
    {
        \DB::beginTransaction();
        try {
            $product = $this->productService->createProduct(data: $request);
            $property = $product->productProperty()->create([
                'price_prefix' => $request['price_prefix'],
                'price_postfix' => $request['price_postfix'],
                'size' => $request['size'],
                'size_prefix' => $request['size_prefix'],
                'land' => $request['land'],
                'land_postfix' => $request['land_postfix'],
                'bedrooms' => $request['bedrooms'],
                'garage' => $request['garage'],
                'garage_size' => $request['garage_size'],
                'year' => $request['year'],
                'map' => $request['map'],
                'map_address' => $request['map_address'],
                'address' => $request['address'],
                'zip' => $request['zip'],
                'logged_in_to_view' => $request['logged_in_to_view'],
                'virtual_tour' => $request['virtual_tour'],
                'agent_display_option' => $request['agent_display_option'],
                'attachments' => $request['attachments'],
                'private_note' => $request['private_note'],
                'energy_class' => $request['energy_class'],
                'energy_global_index' => $request['energy_global_index'],
                'renewable_energy_global_index' => $request['renewable_energy_global_index'],
                'energy_performance' => $request['energy_performance'],
                'epc_current_rating' => $request['epc_current_rating'],
                'epc_potential_rating' => $request['epc_potential_rating'],
                'rop_plan_duration' => $request['rop_plan_duration']
            ]);

            if (array_key_exists('categories', $request)) {
                $product->categories()->sync($request['categories']);
            }

            if (array_key_exists('collections', $request)) {
                $product->collections()->sync($request['collections']);
            }

            // save attributes
            if (array_key_exists('attribute', $request)) {
                $attributeArr = [];
                $count = count($request['attribute']['key']);
                for ($i = 0; $i < $count; $i++) {
                    $attributeArr[$i]['product_id'] = $product->id;
                    $attributeArr[$i]['attribute'] = $request['attribute']['key'][$i];
                    $attributeArr[$i]['value'] = $request['attribute']['value'][$i];
                }
                ProductAttribute::insert($attributeArr);
            }


            if (array_key_exists('thumbnail', $request)) {
                $property->addMedia(storage_path(Constant::MEDIA_TMP_PATH . $request['thumbnail']))->toMediaCollection('thumbnail');
            }

            // move media
            if (array_key_exists('gallery', $request)) {
                foreach ($request['gallery'] as $file) {
                    $property->addMedia(storage_path(Constant::MEDIA_TMP_PATH . $file))->toMediaCollection('gallery');
                }
            }
            \DB::commit();

            // send mail notification
            //\Event::dispatch(new ProductCreatedEvent($product));
            $response = [
                'success' => true,
                'message' => 'Task Completed!',
                'data' => [
                    'status_code' => ResponseAlias::HTTP_CREATED,
                    'reload' => false
                ]
            ];
        } catch (\Exception $e) {
            \DB::rollback();
            $response = [
                'success' => false,
                'message' => 'Something went wrong!',
                'data' => [
                    'errors' => $e->getMessage(),
                    'status_code' => $e->getCode(),
                    'reload' => false,
                ]
            ];
        }

        return $response;
    }
}
