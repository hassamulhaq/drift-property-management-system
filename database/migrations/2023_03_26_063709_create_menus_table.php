<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('title', 150)->nullable();
            $table->string('route');
            $table->string('sort_order')->nullable();
            $table->string('css_class')->nullable();
            $table->tinyInteger('icon_type')->default(0)->comment('0 none, 1 svg, 2 image');
            $table->string('icon', 1000)->nullable();
            $table->string('description', 500)->nullable();
            $table->tinyInteger('is_count')->default('0');
            $table->timestamp('is_active')->nullable();
            $table->foreignId('parent_id')->nullable()->constrained('menus')->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
