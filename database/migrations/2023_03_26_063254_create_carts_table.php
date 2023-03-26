<?php

use App\Models\Cart\Cart;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->char('cart_hash', 32)->index();
            $table->tinyInteger('is_guest')->nullable()->default(null);
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->integer('items_count')->nullable()->default(0);
            $table->tinyInteger('is_active')->default(Cart::DEFAULT_IS_ACTIVE);
            $table->string('cart_currency_code')->nullable();
            $table->decimal('grand_total', 12, 2)->nullable()->default(0);
            $table->decimal('base_grand_total', 12, 2)->nullable()->default(0)->comment('without including additional charges');
            $table->decimal('sub_total', 12, 2)->nullable()->default(0);
            $table->decimal('base_sub_total', 12, 2)->nullable()->default(0)->comment('without including additional charges');
            $table->decimal('tax_total', 12, 2)->nullable()->default(0);
            $table->decimal('base_tax_total', 12, 2)->nullable()->default(0);
            $table->decimal('discount_amount', 12, 2)->nullable()->default(0);
            $table->decimal('base_discount_amount', 12, 2)->nullable()->default(0)->comment('without including additional charges');
            $table->dateTime('conversion_time')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
