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
        Schema::create("frontend_section_control", function (Blueprint $table) {
            $table->id();
            $table->string("name", 255)->nullable();
            $table->string("display_name", 255)->nullable();
            $table->longText("details")->nullable();
            $table->tinyInteger("status")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("frontend_section_control");
    }
};
