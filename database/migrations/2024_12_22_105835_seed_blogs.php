<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

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

        $categories = [];
        $rowNumber = 1;

        // First pass: Collect all unique categories
        while (($row = fgetcsv($csvFile)) !== false) {
            $rowNumber++;

            if (count($headers) !== count($row)) {
                Log::warning("Row {$rowNumber} has ".count($row).' columns while headers have '.count($headers).' columns. Skipping row.');
                continue;
            }

            $data = array_combine($headers, $row);
            $rowCategories = explode(',', $data['categories'] ?? '');

            foreach ($rowCategories as $category) {
                $category = trim($category);
                if (!empty($category) && !in_array($category, $categories)) {
                    $categories[] = $category;
                }
            }
        }

        // Create categories
        $categoryIdMap = [];
        foreach ($categories as $category) {
            $slug = Str::slug($category);
            $categoryId = DB::table('post_categories')->insertGetId([
                'name' => $category,
                'slug' => $slug,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            $categoryIdMap[$category] = $categoryId;
        }

        // Reset file pointer for second pass
        rewind($csvFile);
        // Skip header again
        fgetcsv($csvFile);
        $rowNumber = 1;

        // Second pass: Create posts and map categories
        while (($row = fgetcsv($csvFile)) !== false) {
            $rowNumber++;

            if (count($headers) !== count($row)) {
                Log::warning("Row {$rowNumber} has ".count($row).' columns while headers have '.count($headers).' columns. Skipping row.');
                continue;
            }

            try {
                $data = array_combine($headers, $row);

                // Insert post
                $postId = DB::table('posts')->insertGetId([
                    'title' => $data['title'] ?? null,
                    'slug' => $data['slug'] === '' ? null : ($data['slug'] ?? null),
                    'status' => ($data['status'] ?? 'draft') === 'publish' ? 'published' : ($data['status'] ?? 'draft'),
                    'content' => $data['content'] ? base64_decode($data['content']) : '',
                    'thumbnail' => ($data['thumbnail_url'] === 'NULL' || $data['thumbnail_url'] === '') ? null : str_replace('new.', '', $data['thumbnail_url'] ?? null),
                    'published_at' => $data['published_at'] ? date('Y-m-d H:i:s', strtotime($data['published_at'])) : null,
                    'updated_at' => $data['updated_at'] ? date('Y-m-d H:i:s', strtotime($data['updated_at'])) : ($data['published_at'] ? date('Y-m-d H:i:s', strtotime($data['published_at'])) : now()),
                    'created_at' => $data['published_at'] ? date('Y-m-d H:i:s', strtotime($data['published_at'])) : ($data['updated_at'] ? date('Y-m-d H:i:s', strtotime($data['updated_at'])) : now()),
                ]);

                // Map categories to post
                $rowCategories = explode(',', $data['categories'] ?? '');
                foreach ($rowCategories as $category) {
                    $category = trim($category);
                    if (!empty($category) && isset($categoryIdMap[$category])) {
                        DB::table('post_post_category')->insert([
                            'post_id' => $postId,
                            'post_category_id' => $categoryIdMap[$category],
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);
                    }
                }
            } catch (Exception $e) {
                Log::error("Error processing row {$rowNumber}: ".$e->getMessage());
            }
        }

        fclose($csvFile);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('post_post_category')->truncate();
        DB::table('post_categories')->truncate();
        DB::table('posts')->truncate();
    }
};
