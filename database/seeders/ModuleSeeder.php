<?php

namespace Database\Seeders;


use App\Models\Module\Module;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    public function run()
    {
        $modules = [
            [
                'id' => Module::USER,
                'model' => 'user',
                'is_active' => 1

            ],
            [
                'id' => Module::TEAM,
                'model' => 'team',
                'is_active' => 1
            ],
            [
                'id' => Module::SUBSCRIPTION,
                'model' => 'subscription',
                'is_active' => 1
            ],
            [
                'id' => Module::ADDRESS,
                'model' => 'address',
                'is_active' => 1
            ],
            [
                'id' => Module::TAG,
                'model' => 'tag',
                'is_active' => 1
            ],
            [
                'id' => Module::TYPE,
                'model' => 'type',
                'is_active' => 1
            ],
            [
                'id' => Module::CATEGORY,
                'model' => 'category',
                'is_active' => 1
            ],
            [
                'id' => Module::COLLECTION,
                'model' => 'collection',
                'is_active' => 1
            ],
            [
                'id' => Module::MENU,
                'model' => 'menu',
                'is_active' => 1
            ],
            [
                'id' => Module::POST,
                'model' => 'post',
                'is_active' => 1
            ],
            [
                'id' => Module::PAGE,
                'model' => 'page',
                'is_active' => 1
            ],
            [
                'id' => Module::PRODUCT,
                'model' => 'product',
                'is_active' => 1
            ],
            [
                'id' => Module::PRODUCT_ATTRIBUTE,
                'model' => 'product_attribute',
                'is_active' => 1
            ],
            [
                'id' => Module::LABEL,
                'model' => 'label',
                'is_active' => 1
            ],
            [
                'id' => Module::PRODUCT_PROPERTY,
                'model' => 'product_property',
                'is_active' => 1
            ],
            [
                'id' => Module::FEATURE,
                'model' => 'feature',
                'is_active' => 1
            ],
            [
                'id' => Module::AGENCY,
                'model' => 'agency',
                'is_active' => 1
            ],
            [
                'id' => Module::AGENT,
                'model' => 'agent',
                'is_active' => 1
            ],
            [
                'id' => Module::PARTNER,
                'model' => 'partner',
                'is_active' => 1
            ],
            [
                'id' => Module::PRODUCT_TYPE,
                'model' => 'product_type',
                'is_active' => 1
            ],
            [
                'id' => Module::SHOP,
                'model' => 'shop',
                'is_active' => 1
            ],
            [
                'id' => Module::INVOICE,
                'model' => 'invoice',
                'is_active' => 1
            ],
            [
                'id' => Module::CURRENCY,
                'model' => 'currency',
                'is_active' => 1
            ],
            [
                'id' => Module::ORDER,
                'model' => 'order',
                'is_active' => 1
            ],
            [
                'id' => Module::ORDER_ITEM,
                'model' => 'order_item',
                'is_active' => 1
            ],
            [
                'id' => Module::CART,
                'model' => 'cart',
                'is_active' => 1
            ],
            [
                'id' => Module::WISHLIST,
                'model' => 'wishlist',
                'is_active' => 1
            ],
            [
                'id' => Module::CHECKOUT,
                'model' => 'checkout',
                'is_active' => 1
            ],
            [
                'id' => Module::PAYMENT,
                'model' => 'payment',
                'is_active' => 1
            ],
            [
                'id' => Module::PAYMENT_TYPE,
                'model' => 'payment_type',
                'is_active' => 1
            ],
            [
                'id' => Module::PAYMENT_METHOD,
                'model' => 'payment_method',
                'is_active' => 1
            ],
            [
                'id' => Module::MEDIA,
                'model' => 'media',
                'is_active' => 1
            ],
            [
                'id' => Module::USER_PAYMENT,
                'model' => 'user_payment',
                'is_active' => 1
            ]
        ];

        foreach ($modules as $module) {
            Module::query()->updateOrCreate([
                'id' => $module['id']
            ], $module);
        }
    }
}
