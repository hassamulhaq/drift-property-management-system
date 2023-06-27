<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->after('remember_token', function () use ($table) {
                $table->boolean('two_factor_enabled')->default(false);
                $table->string('two_factor_code')->nullable();
                $table->dateTime('two_factor_expires_at')->nullable();
                $table->string('otp')->nullable();
            });
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'two_factor_enabled',
                'two_factor_code',
                'two_factor_expires_at'
            ]);
        });
    }
};
