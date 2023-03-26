<?php

use App\Models\Product\Product;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('product_properties', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->foreignId('product_id')->unique()->constrained('product_properties')->cascadeOnDelete();
            $table->string('title', 200);
            $table->string('slug')->unique();
            $table->string('sku')->unique();
            $table->string('short_description', 1000)->nullable();
            $table->string('tags', 500)->nullable();
            $table->string('product_number')->nullable();
            $table->float('price', 12, 4)->nullable();
            $table->float('second_price', 12, 4)->nullable();
            $table->string('price_prefix')->nullable();
            $table->string('price_postfix')->nullable();
            $table->string('size')->nullable();
            $table->string('size_prefix')->nullable();
            $table->string('land')->nullable();
            $table->string('land_postfix')->nullable();
            $table->string('bedrooms')->nullable();
            $table->string('garage')->nullable();
            $table->string('garage_size')->nullable();
            $table->string('year')->nullable();
            $table->string('map')->nullable();
            $table->string('map_address')->nullable();
            $table->string('address')->nullable();
            $table->string('zip')->nullable();
            $table->tinyInteger('featured')->default(Product::IS_FEATURED['false'])->comment('1=featured');
            $table->tinyInteger('logged_in_to_view')->default(0);
            $table->string('disclaimer')->nullable();
            $table->string('virtual_tour')->nullable();
            $table->string('agent_display_option')->nullable();
            $table->string('attachments')->nullable();
            $table->string('private_note')->nullable();
            $table->string('energy_class')->nullable();
            $table->string('energy_global_index')->nullable();
            $table->string('renewable_energy_global_index')->nullable();
            $table->string('energy_performance')->nullable();
            $table->string('epc_current_rating')->nullable();
            $table->string('epc_potential_rating')->nullable();
            $table->tinyInteger('status')->default(Product::PRODUCT_STATUS['draft'])->comment('0=draft, 1=published, 2=trashed');
            $table->timestamp('published_at')->nullable();
            $table->foreignId('parent_id')->nullable()->constrained('product_properties');
            $table->json('meta_data')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_properties');
    }
};
