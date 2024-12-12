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
        Schema::create("categories_places", function (Blueprint $table) {
            $table->id();
            $table->string("name", 255);
            $table->longText("details");
            $table->tinyInteger("status");
            $table->string("url", 255);
            $table->string("image", 255)->nullable();
            $table->string("meta_keyword", 255)->nullable();
            $table->text("meta_description")->nullable();
            $table->string("meta_title", 255)->nullable();
            $table->integer("destination_id")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("categories_places");
    }
};
