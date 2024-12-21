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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->nullable()->unique();
            $table->string('status')->default('draft');

            $table->string('fitness_level')->nullable();
            $table->string('max_elevation')->nullable();
            $table->string('commute')->nullable();
            $table->string('best_time')->nullable();
            $table->string('group_size')->nullable();
            $table->string('arrival_at')->nullable();
            $table->string('departure_from')->nullable();
            $table->string('meal')->nullable();
            $table->string('tour_duration')->nullable();
            $table->string('stay')->nullable();

            $table->decimal('price', 10, 2);
            $table->decimal('sale_price_per_person', 10, 2);
            $table->decimal('sale_price_two_plus_per_person', 10, 2)->nullable();
            $table->decimal('sale_price_eight_plus_per_person', 10, 2)->nullable();

            $table->foreignId('destination_id')->constrained();
            $table->foreignId('place_id')->constrained();

            $table->longText('overview');
            $table->text('itinerary')->nullable();
            $table->text('faqs')->nullable();

            $table->json('gallery')->nullable();

            $table->integer('rating_count')->default(0);
            $table->decimal('average_rating', 3, 2)->default(0.00);

            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
