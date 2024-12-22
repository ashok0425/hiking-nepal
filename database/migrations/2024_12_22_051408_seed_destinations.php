<?php

use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $csvFile = database_path('destinations.csv');
        $csvData = array_map('str_getcsv', file($csvFile));
        $headers = array_shift($csvData);

        $destinations = [];
        foreach ($csvData as $row) {
            $data = array_combine($headers, $row);

            // Skip if no category name
            if (empty($data['category_name'])) {
                continue;
            }

            $order = match ($data['slug']) {
                'nepal' => 0,
                'bhutan' => 1,
                'tibet' => 2,
                default => 99,
            };

            $destinations[] = [
                'name' => $data['category_name'],
                'slug' => $data['slug'],
                'cover' => str_replace('new.', '', $data['thumbnail_url']),
                'tagline' => 'Wander in himalayan foothills',
                'desc' => 'We believe that traveling and touring is much more than just a vacation but rather an opportunity to get one with nature and enjoy the deeper aspect of its beauty. And, we work accordingly to provide our customers with similar experiences while on their treks and tours. On our treks and expeditions, we incorporate different types of experiences to enjoy nature, get to know the locals, and understand the culture while having fun. We prioritize blending in with the locals during the trek for cultural and linguistic experience, traditional exposure, and understanding of the place.',
                'status' => 'active',
                'order' => $order,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('destinations')->insert($destinations);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('destinations')->truncate();
    }
};
