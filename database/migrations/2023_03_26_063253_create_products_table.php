<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use \App\Models\Product\Product;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('author_id')->constrained('users');
            $table->string('title', 200);
            $table->text('excerpt')->nullable();
            $table->string('slug')->unique();
            $table->string('short_description', 1000)->nullable();
            $table->text('description')->nullable();
            $table->string('tags', 500)->nullable();
            $table->string('product_number')->nullable();
            $table->float('price', 12, 4)->nullable();
            $table->float('second_price', 12, 4)->nullable();
            $table->string('price_prefix')->nullable();
            $table->string('price_postfix')->nullable();
            $table->string('sku', 200);
            $table->tinyInteger('status')->default(Product::PRODUCT_STATUS['draft'])->comment('0=draft, 1=publish, 2=trash, 3=inherit');
            $table->string('comment_status', 20)->default(Product::PRODUCT_COMMENT_STATUS['open']);
            $table->unsignedBigInteger('comment_count')->default(0);
            $table->string('ping_status', 20)->default(Product::PRODUCT_PING_STATUS['open']);
            $table->string('product_password')->nullable();
            $table->string('to_ping')->default('none');
            $table->string('pinged')->default('none');
            $table->tinyInteger('menu_order')->default(0);
            $table->foreignId('parent_id')->nullable()->constrained('products');
            $table->foreignId('type_id')->constrained('types');
            $table->tinyInteger('featured')->default(Product::IS_FEATURED['false'])->comment('1=featured');
            $table->json('metadata')->nullable();
            $table->timestamp('created_at_gmt')->nullable();
            $table->timestamp('updated_at_gmt')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
