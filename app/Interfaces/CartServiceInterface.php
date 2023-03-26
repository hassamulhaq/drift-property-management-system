<?php

namespace App\Interfaces;

use App\Models\Cart\Cart;
use App\Models\Cart\CartItem;
use App\Models\Product\ProductProperty;

interface CartServiceInterface
{
    public function findProductByUuid(string $uuid): ProductProperty;

    public function findCartItemByCardIdAndProductId(int $cartId, int $productId): CartItem;

    public function findCartItemByCardId(int $cartId): CartItem;

    public function store(array $request);

    public function newCart(ProductProperty $productProperty, array $request);

    public function updateCart(Cart $cart, ProductProperty $productProperty, array $request);

    public function createCartItem(Cart $cart, ProductProperty $productProperty, array $request): \Illuminate\Database\Eloquent\Model|CartItem;

    // don't remove
    //public function updateCartItem(Cart $cart, CartItem $cartItem, Property $property, array $request): bool;

    public function updateCartAfterInsertingCartItems(Cart $cart, CartItem $cartItem): bool;

    public function calcAddVatToAmount(float $amount, int $vat_percentage): float|int;

    public function calcVatAddedValue(float $amount, int $vat_percentage): float|int;

    public function calcExcludeVatFromAmount(float $amount, int $vat_percentage): float|int;

    public function calcVatExcludedValue(float $amount, int $vat_percentage): float|int;
}
