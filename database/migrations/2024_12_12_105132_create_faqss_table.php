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
        Schema::create("faqs", function (Blueprint $table) {
            $table->id();
            $table->longText("question");
            $table->longText("answer");
            $table->unsignedInteger("package_id");
            $table->integer("status");
            $table->integer("show_on_home_page")->default(0)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("faqss");
    }
};
