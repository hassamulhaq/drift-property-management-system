<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('property_labels', function (Blueprint $table) {
            $table->id();

            $table->foreignId('property_id')->constrained('properties');
            $table->foreignId('label_id')->constrained('labels');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('property_labels');
    }
};
