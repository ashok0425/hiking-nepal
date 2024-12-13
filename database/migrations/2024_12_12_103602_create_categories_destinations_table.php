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
        Schema::create('categories_destinations', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->unsignedInteger('destination_id')->nullable();
            $table->integer('order')->nullable();
            $table->integer('menu_order')->default(1);
            $table->longText('details')->nullable();
            $table->tinyInteger('status');
            $table->string('url', 255);
            $table->string('meta_title', 255)->nullable();
            $table->longText('meta_keyword')->nullable();
            $table->longText('meta_description')->nullable();
            $table->tinyInteger('quick_trips')->nullable();
            $table->string('image', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories_destinations');
    }
};
