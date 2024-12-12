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
        Schema::create("packages", function (Blueprint $table) {
            $table->id();
            $table->string("name", 255)->nullable();
            $table->longText("outline_itinerary")->nullable();
            $table->longText("detailed_itinerary")->nullable();
            $table->longText("useful_info")->nullable();
            $table->longText("equipment")->nullable();
            $table->integer("price")->default(0)->nullable();
            $table->string("destination_id", 11)->nullable();
            $table->integer("category_destination_id")->nullable();
            $table->tinyInteger("status")->nullable();
            $table->string("duration", 255)->nullable();
            $table->string("max_altitude", 255)->nullable();
            $table->string("url", 255)->nullable();
            $table->string("difficulty", 255)->nullable();
            $table->string("activity", 255)->nullable();
            $table->string("route_detail", 255)->nullable();
            $table->string("best_month", 255)->nullable();
            $table->string("room", 255)->nullable();
            $table->string("transport", 255)->nullable();
            $table->string("operation", 255)->nullable();
            $table->string("meals", 255)->nullable();
            $table->string("group_size", 255)->nullable();
            $table->text("overview")->nullable();
            $table->text("offer")->nullable();
            $table->longText("include_exclude")->nullable();
            $table->longText("trip_excludes")->nullable();
            $table->string("page_title", 255)->nullable();
            $table->string("meta_author", 255)->nullable();
            $table->text("meta_keywords")->nullable();
            $table->string("meta_description", 255)->nullable();
            $table->text("routemap")->nullable();
            $table->string("rating", 255)->nullable();
            $table->string("trip_code", 255)->nullable();
            $table->string("trip_start", 255)->nullable();
            $table->string("trip_end", 255)->nullable();
            $table->longText("important_notes")->nullable();
            $table->longText("physical_condition")->nullable();
            $table->longText("additional_info")->nullable();
            $table->string("slogan", 255)->nullable();
            $table->string("banner", 255)->nullable();
            $table->string("thumbnail", 255)->nullable();
            $table->string("arrival", 255)->nullable();
            $table->string("departure_from", 255)->nullable();
            $table->string("fitness_level", 255)->nullable();
            $table->longText("faq")->nullable();
            $table->integer("order")->nullable();
            $table->tinyInteger("hot_deal_package")->nullable();
            $table->integer("category_place_id")->nullable();
            $table->string("trip_id", 255)->nullable();
            $table->string("discounted_price", 255)->nullable();
            $table->text("video")->nullable();
            $table->string("mobile_meta_keyword", 255)->nullable();
            $table->string("mobile_meta_title", 255)->nullable();
            $table->string("mobile_meta_description", 255)->nullable();
            $table->string("map_title", 255)->nullable();
            $table->text("roadmap")->nullable();
            $table->string("circuit_title", 255)->nullable();
            $table->string("circuit_image", 255)->nullable();
            $table->timestamps(); // This adds both 'created_at' and 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("packages");
    }
};
