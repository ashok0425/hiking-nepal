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
        Schema::create("testimonials", function (Blueprint $table) {
            $table->id();
            $table->string("name"); // Equivalent to varchar(255), not null
            $table->unsignedInteger("package_id")->nullable();
            $table->string("image")->nullable();
            $table->longText("content")->nullable();
            $table->tinyInteger("status")->default(0); // Equivalent to tinyint, default 0
            $table->integer("rating")->nullable();
            $table->string("title")->nullable();
            $table->string("email")->nullable();
            $table->date("date")->nullable();
            $table->tinyInteger("display_home")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("testimonials");
    }
};
