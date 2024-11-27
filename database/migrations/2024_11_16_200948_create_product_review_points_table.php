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
        Schema::create('product_review_point', function (Blueprint $table) {
            $table->foreignId('product_review_id')
                ->constrained('product_reviews')->cascadeOnDelete();
            $table->foreignId('point_id')
                ->constrained('review_points')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_review_points');
    }
};
