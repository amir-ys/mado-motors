<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->unsigned()->nullable()->index();
            $table->unsignedInteger('_lft')->default(0)->index();
            $table->unsignedInteger('_rgt')->default(0)->index();
            $table->string('name_fa', 191);
            $table->string('name_en', 191)->default('');
            $table->tinyInteger('type')->default(0);
            $table->string('region', 10)->nullable();
            $table->string('latitude', 191)->nullable();
            $table->string('longitude', 191)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        // Set AUTO_INCREMENT start value for `id`
        DB::statement("ALTER TABLE `cities` AUTO_INCREMENT = 1002");
        DB::unprepared(file_get_contents(__DIR__ . '/cities.sql'));
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
};
