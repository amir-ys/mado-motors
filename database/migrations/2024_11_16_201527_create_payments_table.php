<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete();
            $table->foreignId('order_id')
                ->constrained('orders')
                ->cascadeOnDelete();
            $table->tinyInteger('method');
            $table->tinyInteger('status');
            $table->tinyInteger('driver')->nullable();
            $table->integer('price');
            $table->timestamp('paid_at')->nullable();
            $table->string('transaction_id', 255)->nullable();
            $table->string('ref_id', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
