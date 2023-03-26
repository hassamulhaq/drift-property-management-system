<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('product_property_features', function (Blueprint $table) {
            $table->id();
            $table->foreignId('property_id')->constrained('product_properties');
            $table->foreignId('feature_id')->constrained('features');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_property_features');
    }
};
