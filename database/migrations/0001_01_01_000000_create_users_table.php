<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 190);
            $table->string('last_name', 190);
            $table->string('national_code', 10)->unique();
            $table->string('mobile', 20)->unique();
            $table->string('phone', 20)->nullable();
            $table->string('email')->unique()->nullable();
            $table->foreignId('main_address_id')->nullable();
            $table->string('password');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
