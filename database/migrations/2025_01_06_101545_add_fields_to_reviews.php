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
        $reviews = DB::table('reviews')->get(['id', 'package_id']);

        Schema::table('reviews', function (Blueprint $table) {
            $table->date('date')->nullable();
        });

        Schema::create('package_review', function (Blueprint $table) {
            $table->id();
            $table->foreignId('review_id')->constrained('reviews')->cascadeOnDelete();
            $table->foreignId('package_id')->constrained('packages')->cascadeOnDelete();
            $table->timestamps();
        });

        // Migrate existing relationships to pivot table
        foreach ($reviews as $review) {
            DB::table('package_review')->insert([
                'review_id' => $review->id,
                'package_id' => $review->package_id,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        // Remove old column
        Schema::table('reviews', function (Blueprint $table) {
            $table->dropForeign(['package_id']);
            $table->dropColumn('package_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Add back the original column
        Schema::table('reviews', function (Blueprint $table) {
            $table->foreignId('package_id')->constrained('packages')->cascadeOnDelete();
            $table->dropColumn('date');
        });

        // Migrate data back from pivot table
        $relations = DB::table('package_review')->get();
        foreach ($relations as $relation) {
            DB::table('reviews')
                ->where('id', $relation->review_id)
                ->update(['package_id' => $relation->package_id]);
        }

        Schema::dropIfExists('package_review');
    }
};
