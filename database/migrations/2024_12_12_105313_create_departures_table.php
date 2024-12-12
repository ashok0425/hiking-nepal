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
        Schema::create("departures", function (Blueprint $table) {
            $table->id();
            $table->integer("package_id")->default(0);
            $table->date("start_date")->nullable();
            $table->integer("price")->default(0)->nullable();
            $table->integer("offerprice")->nullable();
            $table->string("availability")->nullable();
            $table->tinyInteger("status")->default(1)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("departures");
    }
};
