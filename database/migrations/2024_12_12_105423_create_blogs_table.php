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
        Schema::create("blogs", function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("post_author")->default(0)->nullable();
            $table
                ->string("post_date", 255)
                ->default("0000-00-00 00:00:00")
                ->nullable();
            $table
                ->string("post_date_gmt", 255)
                ->default("0000-00-00 00:00:00")
                ->nullable();
            $table->longText("post_content")->nullable();
            $table->text("post_title")->nullable();
            $table->text("post_excerpt")->nullable();
            $table->string("post_status", 20)->default("publish")->nullable();
            $table->string("comment_status", 20)->default("open")->nullable();
            $table->string("ping_status", 20)->default("open")->nullable();
            $table->string("post_password", 20)->nullable();
            $table->string("post_name", 200)->nullable();
            $table->text("to_ping")->nullable();
            $table->text("pinged")->nullable();
            $table
                ->string("post_modified", 255)
                ->default("0000-00-00 00:00:00")
                ->nullable();
            $table
                ->string("post_modified_gmt", 255)
                ->default("0000-00-00 00:00:00")
                ->nullable();
            $table->longText("post_content_filtered")->nullable();
            $table->unsignedBigInteger("post_parent")->default(0)->nullable();
            $table->string("guid", 255)->nullable();
            $table->integer("menu_order")->default(0)->nullable();
            $table->string("post_type", 20)->default("post")->nullable();
            $table->string("post_mime_type", 100)->nullable();
            $table->bigInteger("comment_count")->default(0)->nullable();
            $table->string("robotsmeta", 64)->nullable();
            $table->string("meta_title", 255)->nullable();
            $table->string("keyword", 255)->nullable();
            $table->text("meta_description")->nullable();
            $table->string("cover_image", 255)->nullable();
            $table->string("url", 255)->nullable();
            $table->integer("display_homepage")->nullable();
            $table->string("mobile_title", 255)->nullable();
            $table->string("mobile_keyword", 255)->nullable();
            $table->string("mobile_description", 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("blogs");
    }
};
