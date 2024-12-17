<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $csvFile = database_path('package-categories.csv');
        $csvData = array_map('str_getcsv', file($csvFile));
        $headers = array_shift($csvData); // Remove headers row
        $headerCount = count($headers);

        $categories = [];
        foreach ($csvData as $row) {
            // Skip empty rows or rows with wrong column count
            if (empty($row) || count($row) !== $headerCount) {
                continue;
            }

            $data = array_combine($headers, $row);

            // Skip if no name
            if (empty($data['name'])) {
                continue;
            }

            $categories[] = [
                'name' => $data['name'],
                'slug' => $data['slug'],
                'description' => base64_decode($data['description']),
                'tagline' => $data['tagline'] ?? ucfirst($data['name']) . ' Packages', // Generate tagline from name if not provided
                'status' => 'active', // Set default status as active
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('package_categories')->insert($categories);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('package_categories')->truncate();
    }
};
