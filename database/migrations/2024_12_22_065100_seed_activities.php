<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $activities = [
            [
                'name' => 'Climbing',
                'slug' => Str::slug('Climbing'),
                'description' => 'Experience thrilling mountain climbing adventures in Nepal.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Short Treks',
                'slug' => Str::slug('Short Treks'),
                'description' => 'Explore beautiful trails with our short trekking packages.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tour',
                'slug' => Str::slug('Tour'),
                'description' => 'Discover Nepal through our guided tour packages.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Heli Tours',
                'slug' => Str::slug('Heli Tours'),
                'description' => 'See Nepal from above with our helicopter tour services.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Alternate Tours',
                'slug' => Str::slug('Alternate Tours'),
                'description' => 'Experience unique and alternative ways to explore Nepal.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Festive Tour',
                'slug' => Str::slug('Festive Tour'),
                'description' => 'Join cultural festivals and celebrations across Nepal.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('activities')->insert($activities);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('activities')->truncate();
    }
};
