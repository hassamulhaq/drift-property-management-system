<?php

namespace App\Services;

use App\Interfaces\CartServiceInterface;
use App\Models\Cart\Cart;
use App\Models\Cart\CartItem;
use App\Models\Product\ProductProperty;
use App\Traits\CartTrait;
use App\Traits\UserHelperTrait;
use App\Traits\VatTrait;
use Throwable;
use const App\Traits\VAT_PERCENTAGE;

class CartService implements CartServiceInterface
{
    use VatTrait, UserHelperTrait, CartTrait;

    protected array $response = [];

    public function __construct()
    {

    }

    public function findCartItemByCardIdAndProductId($cartId, $productId): CartItem
    {
        return CartItem::whereCartId($cartId)->whereProductId($productId)->firstOrFail();
    }

    public function findCartItemByCardId($cartId): CartItem
    {
        return CartItem::whereCartId($cartId)->firstOrFail();
    }

    /**
     * @throws Throwable
     */
    public function store($request): array
    {
        $property = $this->findProductByUuid($request['product_uuid']);
        $this->makeFreshCartSession();

        try {
            \DB::beginTransaction();

            $cartObj = $this->getActiveCart();

            // new cart
            if (!is_object($cartObj)) {
                $res = $this->newCart($property, $request);
            }

            // update existing cart
            if (is_object($cartObj)) {
                $res = $this->updateCart($cartObj, $property, $request);
            }

            \DB::commit();

            $res['reload'] = true;
            $res['status_code'] = 201;
            $this->response = $res;

        } catch (\Exception $e) {
            \DB::rollback();

            $this->response = [
                'success' => false,
                'status_code' => $e->getCode(),
                'reload' => false,
                'type' => 'try_catch exception',
                'message' => 'Something went wrong!',
                'data' => ['message' => $e->getMessage()]
            ];
        }

        return $this->response;
    }

    public function findProductByUuid($uuid): ProductProperty
    {
        return ProductProperty::whereUuid($uuid)->first();
    }

    public function newCart(ProductProperty $productProperty, $request): array
    {
        $cart = Cart::create([
            'user_id' => $this->getUserOrGuestId(),
            'is_guest' => is_null($this->getUserOrGuestId()), // guest=null
            'is_active' => true,
            'cart_currency_code' => Cart::DEFAULT_CART_CURRENCY_CODE,
            'conversion_time' => now(),
            'cart_hash' => md5(uniqid())
        ]);
        if (!is_object($cart))
            return ['success' => false, 'message' => 'Error! Cart not created', 'data' => ['function newCart()']];

        // create session
        \Session::put('cart.cart_hash', $cart->cart_hash);

        // entry in cart_items
        $newCartItem = $this->createCartItem($cart, $productProperty, $request);

        // update cart after entry in cart_items
        $is_updated = $this->updateCartAfterInsertingCartItems($cart, $newCartItem);
        if (!$is_updated) return ['success' => false, 'message' => 'Error! Cart not updated after adding cart item', 'data' => ['function newCart()']];


        // create cart_hash
        //\Event::dispatch(new CartCreatedEvent(cart: $cart));

        return $this->response = [
            'success' => true,
            'message' => __('cart.product_added_to_cart'),
            'data' => ["Item ({$productProperty->title}) is added to cart!"]
        ];
    }

    public function createCartItem(Cart $cart, ProductProperty $productProperty, array $request): \Illuminate\Database\Eloquent\Model|CartItem
    {
        return $cart->cartItems()->create([
            'product_id' => (int)$productProperty->product_id,
            'quantity' => (int)$request['quantity'],
            'sku' => (string)$productProperty->sku,
            'weight' => (float)$productProperty->weight,
            'total_weight' => (float)$productProperty->weight * $request['quantity'],
            'item_count' => (int)1, // on create item_count is 1, on update value may be different
            //'price' => (float) $this->calcAddVatToAmount($property->price, VAT_Helper::VAT_PERCENTAGE),
            'price' => (float)$productProperty->price,
            'base_price' => (float)$productProperty->price,
            'total' => (float)$this->calcAddVatToAmount($productProperty->price * $request['quantity'], VAT_PERCENTAGE),
            'base_total' => (float)$productProperty->price * $request['quantity'],
            'tax_percent' => VAT_PERCENTAGE,
            'tax_amount' => $this->calcVatAddedValue($productProperty->price * $request['quantity'], VAT_PERCENTAGE),
            'discount_percent' => 0,
            'discount_amount' => 0
        ]);
    }

    public function updateCartAfterInsertingCartItems(Cart $cart, CartItem $cartItem): bool
    {
        return $cart->update([
            'items_count' => $cartItem->whereCartId($cart->id)->count(),
            'grand_total' => $cartItem->whereCartId($cart->id)->sum('total') - $cartItem->discount_amount,
            'base_grand_total' => $cartItem->whereCartId($cart->id)->sum('base_total'),
            'sub_total' => $cartItem->whereCartId($cart->id)->sum('total'),
            'base_sub_total' => $cartItem->whereCartId($cart->id)->sum('base_total'),
            'tax_total' => $cartItem->whereCartId($cart->id)->sum('tax_amount') - $cartItem->discount_amount,
            'base_tax_total' => $cartItem->whereCartId($cart->id)->sum('tax_amount'),
            'discount_amount' => 0,
            'base_discount_amount' => 0,
            'conversion_time' => now()
        ]);
    }

    public function updateCart(Cart $cart, ProductProperty $productProperty, $request): array
    {
        //$cartItem = $this->findCartItemByCardIdAndProductId($cart->id, $property->id);

        $newCartItem = $this->createCartItem($cart, $productProperty, $request);

        // update cart after entry in cart_items
        $is_updated = $this->updateCartAfterInsertingCartItems($cart, $newCartItem);
        if (!$is_updated)
            return [
                'success' => false,
                'message' => 'Error! Cart not updated after adding cart item',
                'data' => ['function updateCart()']
            ];

        /*
         * enable below code if you want to update same cart_item if cart_id, product_id both same.
         * then also update updateCartAfterInsertingCartItems() function
         * */
        // if same product not exists then create new one
//        if ( ! is_object($cartItem) ) {
//            $newCartItem = $this->createCartItem($cart, $property, $request);
//
//            // update cart after entry in cart_items
//            $this->updateCartAfterInsertingCartItems($cart, $newCartItem);
//        } else {
//            $this->updateCartItem($cart, $cartItem, $property, $request);
//
//            // update main cart after entry in cart_items
//            $this->updateCartAfterInsertingCartItems($cart, $cartItem);
//        }

        return $this->response = [
            'success' => true,
            'message' => __('cart.product_added_to_cart'),
            'data' => ["Item {$productProperty->title} is added to cart!", "Cart updated"]
        ];
    }

// don't remove
//    public function updateCartItem(Cart $cart, CartItem $cartItem, Property $property, array $request): bool
//    {
//        return $cart->cartItems()->update([
//            'quantity' => (int) $cartItem->quantity + $request['quantity'],
//            'weight' => (float) $property->weight,
//            'total_weight' => (float) $cartItem->weight + ($property->weight * $request['quantity']),
//            'item_count' => (int) $cartItem->item_count + 1, // on create item_count is 1, on update value may be different
//            'price' => (float) $property->price, // both okay if we remove price, base_price from here
//            'base_price' => (float) $property->price,
//            'total' => (float) $cartItem->total + ($property->price * $request['quantity']),
//            'base_total' => (float) $cartItem->base_total + ($property->price * $request['quantity']),
//            'tax_percent' => CartHelper::VAT_PERCENTAGE,
//            'tax_amount' => CartHelper::VAT_AMOUNT,
//            'discount_percent' => 0,
//            'discount_amount' => 0
//        ]);
//    }

    public function getCart(): array
    {
        $cartObject = [];
        $cartObject['cart'] = $this->getActiveCart();
        $cartObject['cartItems'] = $this->getActiveCartItems();

        return $cartObject;
    }
}
