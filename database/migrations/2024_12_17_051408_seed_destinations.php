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

            $destinations[] = [
                'name' => $data['category_name'],
                'slug' => $data['slug'],
                'cover' => str_replace('new.', '', $data['thumbnail_url']),
                'status' => 'active',
                'tagline' => 'Explore '.$data['category_name'],
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
