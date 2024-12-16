<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $csvFile = fopen(database_path('blogs.csv'), 'r');

        if ($csvFile === false) {
            throw new Exception('Unable to open CSV file');
        }

        // Skip the header row
        $headers = fgetcsv($csvFile);
        if ($headers === false) {
            throw new Exception('CSV file is empty');
        }

        $rowNumber = 1; // Keep track of row number for debugging

        // Read and insert each row
        while (($row = fgetcsv($csvFile)) !== false) {
            $rowNumber++;

            // Check if number of columns match
            if (count($headers) !== count($row)) {
                Log::warning("Row {$rowNumber} has " . count($row) . ' columns while headers have ' . count($headers) . ' columns. Skipping row.');

                continue;
            }

            try {
                $data = array_combine($headers, $row);

                DB::table('posts')->insert([
                    'title' => $data['title'] ?? null,
                    'slug' => $data['slug'] === '' ? null : ($data['slug'] ?? null),
                    'status' => ($data['status'] ?? 'draft') === 'publish' ? 'published' : ($data['status'] ?? 'draft'),
                    'content' => $data['content'] ? base64_decode($data['content']) : "",
                    'thumbnail' => ($data['thumbnail_url'] === 'NULL' || $data['thumbnail_url'] === '') ? null : str_replace('new.', '', $data['thumbnail_url'] ?? null),
                    'published_at' => $data['published_at'] ? date('Y-m-d H:i:s', strtotime($data['published_at'])) : null,
                    'updated_at' => $data['updated_at'] ? date('Y-m-d H:i:s', strtotime($data['updated_at'])) : ($data['published_at'] ? date('Y-m-d H:i:s', strtotime($data['published_at'])) : now()),
                    'created_at' => $data['published_at'] ? date('Y-m-d H:i:s', strtotime($data['published_at'])) : ($data['updated_at'] ? date('Y-m-d H:i:s', strtotime($data['updated_at'])) : now()),
                ]);
            } catch (Exception $e) {
                Log::error("Error processing row {$rowNumber}: " . $e->getMessage());
                // Optionally, you can throw the exception if you want to stop the migration
                // throw $e;
            }
        }

        fclose($csvFile);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('posts')->truncate();
    }
};
