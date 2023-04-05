<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('states', function (Blueprint $table) {
            $table->id();
            $table->string('country_code')->nullable();
            $table->string('code')->nullable();
            $table->string('default_name')->nullable();

            $table->foreignId('country_id')->nullable()->constrained('countries')->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::dropIfExists('states');
    }
};
