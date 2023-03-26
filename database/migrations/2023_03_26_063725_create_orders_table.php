<?php

use App\Models\Order\Order;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->uuid('order_number')->unique();
            $table->enum('status', Order::ORDER_STATUS)->default(Order::ORDER_STATUS_PENDING);
            $table->tinyInteger('is_guest')->default(User::DEFAULT_IS_GUEST);
            $table->integer('total_item_count')->nullable();
            $table->integer('total_quantity_ordered')->nullable();
            $table->string('order_currency_code')->nullable();
            $table->decimal('discount_total', 12, 2)->default(0);
            $table->decimal('base_discount_total', 12, 2)->default(0);
            $table->decimal('shipping_total', 12, 2)->default(0);
            $table->decimal('shipping_tax', 12, 2)->default(0);
            $table->decimal('grand_total', 12, 2)->default(0);
            $table->decimal('base_grand_total', 12, 2)->default(0)->comment('without including additional charges');
            $table->foreignId('payment_method_id')->nullable()->constrained('payment_methods')->nullOnDelete();
            $table->string('payment_method_title')->nullable();
            $table->string('transaction_id')->nullable()->comment('Unique transaction ID.');
            $table->dateTime('date_paid')->nullable();
            $table->dateTime('date_completed')->nullable();
            $table->string('cart_hash')->nullable()->comment('MD5 hash of cart items to ensure orders are not modified');
            $table->boolean('set_paid')->default(false)->comment('Define if the order is paid. It will set the status to processing and reduce stock items. Default is false');
            $table->timestamp('date_modified')->nullable();
            $table->foreignId('parent_id')->nullable()->constrained('orders');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
