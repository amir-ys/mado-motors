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
        Schema::create('product_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')
                ->cascadeOnDelete();
            $table->foreignId('owner_id')->constrained('users')
                ->cascadeOnDelete();
            $table->foreignId('agent_id')->constrained('agents')
                ->cascadeOnDelete();
            $table->foreignId('product_id')->constrained('products')
                ->cascadeOnDelete();
            $table->string('chassis_number');
            $table->string('engine_number');
            $table->string('plaque_number')->nullable();
            $table->date('year_of_production')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('product_detail_owner', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('product_detail_id')->constrained('product_details')->cascadeOnDelete();
            $table->timestamp('transfer_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_details');
    }
};
