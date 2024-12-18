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
        function formatSerializedData($serializedData)
        {
            // First level - Main array
            preg_match('/^a:2:{(.*)}$/', $serializedData, $mainMatch);

            // Tabs array
            preg_match('/s:4:"tabs";a:4:{(.*)}/', $serializedData, $tabsMatch);

            // Parse each tab
            $tabs = [];
            for ($i = 0; $i < 4; $i++) {
                preg_match('/i:' . $i . ';a:2:{(.*?);s:7:"content";s:(.*?):\"(.*?)\";}/s', $tabsMatch[1], $tabMatch);

                if (!empty($tabMatch)) {
                    preg_match('/s:5:"title";s:(.*?):"(.*?)"/', $tabMatch[1], $titleMatch);

                    $tabs[$i] = [
                        'title' => $titleMatch[2] ?? '',
                        'content' => $tabMatch[3] ?? ''
                    ];
                }
            }

            return $tabs;
        }

        $csvPath = database_path('packages.csv');
        $file = fopen($csvPath, 'r');

        $headers = fgetcsv($file);
        $tours = [];

        $cleanValue = function ($value) {
            $value = trim($value, "'");
            return ($value === 'NULL' || $value === '') ? null : $value;
        };

        // Read CSV data
        while ($row = fgetcsv($file)) {
            $tour = array_combine($headers, $row);

            $tours[] = [
                'id' => (int) $cleanValue($tour['id']),
                'title' => $cleanValue($tour['title']),
                'slug' => $cleanValue($tour['slug']),
                'status' => $cleanValue($tour['status']),
                'overview' => $cleanValue($tour['overview']),
                'tour_duration' => $cleanValue($tour['tour_duration']),
                'fitness_level' => $cleanValue($tour['fitness_level']),
                'group_size' => $cleanValue($tour['group_size']),
                'best_time' => $cleanValue($tour['best_time']),
                'destinations' => $cleanValue($tour['destinations']),
                'places' => $cleanValue($tour['places']),
                'activities' => $cleanValue($tour['activities']),
                'max_elevation' => $cleanValue($tour['max_elevation']),
                'commute' => $cleanValue($tour['commute']),
                'arrival_at' => $cleanValue($tour['arrival_at']),
                'departure_from' => $cleanValue($tour['departure_from']),
                'meal' => $cleanValue($tour['meal']),
                'stay' => $cleanValue($tour['stay']),
                'departures' => $cleanValue($tour['departures']) ? @unserialize($cleanValue($tour['departures'])) : [],
                'other_data' => $cleanValue($tour['other_data']) ? @formatSerializedData($cleanValue($tour['other_data'])) : [],
                'price' => (float) $cleanValue($tour['price']),
                'sale_price_per_person' => (float) $cleanValue($tour['sale_price_per_person']),
                'sale_price_two_plus_per_person' => $cleanValue($tour['sale_price_two_plus_per_person']),
                'sale_price_eight_plus_per_person' => $cleanValue($tour['sale_price_eight_plus_per_person']),
                'rating_count' => (int) $cleanValue($tour['rating_count']),
                'average_rating' => (float) $cleanValue($tour['average_rating']),
                'gallery' => array_filter(array_map('trim', explode(',', $cleanValue($tour['gallery']) ?? ''))),
                'meta_title' => $cleanValue($tour['meta_title']),
                'meta_description' => $cleanValue($tour['meta_description']),
                'meta_keywords' => $cleanValue($tour['meta_keywords']),
                'categories' => array_filter(array_map('trim', explode(',', $cleanValue($tour['categories']) ?? ''))),
                'created_at' => $cleanValue($tour['created_at']),
                'updated_at' => $cleanValue($tour['updated_at'])
            ];
        }

        fclose($file);

        foreach ($tours as $tour) {
            DB::table('packages')->insert($tour);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('packages')->truncate();
    }
};
