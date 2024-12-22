<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $csvPath = database_path('packages.csv');
        $itineraryPath = database_path('itinarary.csv');

        $file = fopen($csvPath, 'r');

        // Process itinerary data first
        $itineraryData = $this->processItineraryData($itineraryPath);

        $headers = fgetcsv($file);

        $cleanValue = function ($value) {
            $value = trim($value, "'");

            return ($value === 'NULL' || $value === '') ? null : $value;
        };

        $destinations = DB::table('destinations')->pluck('id', 'name')->toArray();
        $places = DB::table('places')->pluck('id', 'name')->toArray();
        $categories = DB::table('package_categories')->pluck('id', 'name')->toArray();
        $activities = DB::table('activities')->get(['id', 'name'])->toArray();

        while ($row = fgetcsv($file)) {
            $tour = array_combine($headers, $row);

            $destinations_array = array_map('trim', explode(',', $cleanValue($tour['destinations']) ?? ''));
            $destinationName = array_pop($destinations_array);
            $destinationId = $destinationName ? ($destinations[trim($destinationName)] ?? null) : null;

            $placeName = $cleanValue(str_replace(' Region', '', $tour['places']));
            $placeId = $placeName ? ($places[trim($placeName)] ?? null) : null;
            $overview = $cleanValue($tour['overview']) ?? 'No Overview';

            // Process additional content from itinerary data
            $productId = $cleanValue($tour['id']);
            if (isset($itineraryData[$productId])) {
                $tabContent = $this->processTabContent($itineraryData[$productId], $overview);
                $overview = $tabContent['overview'];
                $itinerary = $tabContent['itinerary'];
            } else {
                $itinerary = null;
            }

            // Replace URLs and clean HTML attributes
            $cleanHtml = function ($content) {
                if (!$content) return null;
                // Replace URLs
                $content = preg_replace('/https:\/\/new\./i', 'https://', $content);
                // Remove class, style, and id attributes
                return preg_replace('/\s(class|style|id)=["\'][^\'"]*["\']/', '', $content);
            };

            $overview = $cleanHtml($overview);
            $itinerary = $cleanHtml($itinerary);

            $overview = preg_replace('/\[icon_tick state="on"\]/', "<br>✓ &nbsp;", $overview);
            $overview = preg_replace('/\[icon_tick state="off"\]/', "<br>✗ &nbsp;", $overview);
            $overview = $cleanHtml($overview);

            $package = [
                'id' => (int) $cleanValue($tour['id']),
                'show_in_nav' => true,
                'title' => $cleanValue($tour['title']) ?? 'No Title',
                'slug' => $cleanValue($tour['slug']),
                'status' => $cleanValue($tour['status']) === 'publish' ? 'published' : $cleanValue($tour['status']),
                'overview' => preg_replace(['/<strong>/'], ['<br><strong>'], $overview),
                'itinerary' => preg_replace(['/<strong>/'], ['<br><strong>'], $itinerary),
                'tour_duration' => $cleanValue($tour['tour_duration']),
                'fitness_level' => $cleanValue($tour['fitness_level']),
                'group_size' => $cleanValue($tour['group_size']),
                'best_time' => $cleanValue($tour['best_time']),
                'destination_id' => $destinationId ?? 2, // nepal
                'place_id' => $placeId ?? 3, // everest
                // 'activities' => $cleanValue($tour['activities']),
                'max_elevation' => $cleanValue($tour['max_elevation']),
                'commute' => $cleanValue($tour['commute']),
                'arrival_at' => $cleanValue($tour['arrival_at']),
                'departure_from' => $cleanValue($tour['departure_from']),
                'meal' => $cleanValue($tour['meal']),
                'stay' => $cleanValue($tour['stay']),
                // 'departures' => $cleanValue($tour['departures']) ? json_encode(@unserialize($cleanValue($tour['departures']))) : null,
                'price' => $cleanValue($tour['price']) > 0 ? ((float) $cleanValue($tour['price']) + 100) : 0,
                'sale_price_per_person' => (float) $cleanValue($tour['sale_price_per_person']),
                'sale_price_two_plus_per_person' => (float) $cleanValue($tour['sale_price_two_plus_per_person']),
                'sale_price_eight_plus_per_person' => (float) $cleanValue($tour['sale_price_eight_plus_per_person']),
                'rating_count' => (int) $cleanValue($tour['rating_count']),
                'average_rating' => (float) $cleanValue($tour['average_rating']),
                'gallery' => json_encode(array_filter(array_map('trim', explode(',', $cleanValue($tour['gallery']) ?? '')))),
                'meta_title' => $cleanValue($tour['meta_title']),
                'meta_description' => $cleanValue($tour['meta_description']),
                'meta_keywords' => $cleanValue($tour['meta_keywords']) ?
                    implode(',', array_filter(array_map(
                        'trim',
                        preg_split('/[\/,]+/', trim(trim($tour['meta_keywords']), "'"))
                    ))) : null,
                'created_at' => $cleanValue($tour['created_at']),
                'updated_at' => $cleanValue($tour['updated_at']),
            ];

            DB::table('packages')->insert($package);

            // Add categories
            $categoryNames = array_filter(array_map('trim', explode(',', $cleanValue($tour['categories']) ?? '')));
            foreach ($categoryNames as $categoryName) {
                if (! empty($categoryName) && isset($categories[$categoryName])) {
                    DB::table('package_package_category')->insert([
                        'package_id' => $package['id'],
                        'package_category_id' => $categories[$categoryName],
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }

            // Map activities based on package title
            $packageTitle = strtolower($package['title']);
            foreach ($activities as $activity) {
                if (str_contains($packageTitle, strtolower($activity->name))) {
                    DB::table('activity_package')->insert([
                        'package_id' => $package['id'],
                        'activity_id' => $activity->id,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }

            // Process and insert departures
            $departuresData = $cleanValue($tour['departures']);
            if ($departuresData) {
                $departures = @unserialize($departuresData) ?? null;
                if ($departures && is_array($departures)) {
                    foreach ($departures as $departure) {
                        if (isset($departure['from'], $departure['to'])) {
                            DB::table('departures')->insert([
                                'package_id' => $package['id'],
                                'start_date' => $departure['from'],
                                'end_date' => $departure['to'],
                                'created_at' => now(),
                                'updated_at' => now(),
                            ]);
                        }
                    }
                }
            }
        }

        fclose($file);
    }

    private function processItineraryData($csvPath): array
    {
        $data = [];
        if (($handle = fopen($csvPath, 'r')) !== false) {
            $keys = fgetcsv($handle);
            while (($row = fgetcsv($handle)) !== false) {
                $row = array_combine($keys, $row);
                $otherData = @unserialize(base64_decode($row['other_data'])) ?? null;
                if ($otherData && isset($otherData['tabs'])) {
                    $data[$row['product_id']] = $otherData;
                }
            }
            fclose($handle);
        }
        return $data;
    }

    private function processTabContent($data, $originalOverview): array
    {
        $itinerary = '';
        $additionalContent = '';
        $tabOrder = ['detailed itinerary', 'costs', 'useful information', 'map'];

        if (isset($data['tabs']) && is_array($data['tabs'])) {
            foreach ($data['tabs'] as $tab) {
                $title = strtolower(trim($tab['title']));
                $content = trim($tab['content']);

                if (empty($title) || empty($content)) {
                    continue;
                }

                if (str_contains($title, 'itinerary')) {
                    $itinerary = $content;
                } else {
                    // Check if the tab title matches any of our desired sections
                    foreach ($tabOrder as $orderTitle) {
                        if (str_contains($title, $orderTitle)) {
                            $additionalContent .= "<h3>" . ucwords($title) . "</h3>" . $content;
                            break;
                        }
                    }
                }
            }
        }

        // Combine original overview with additional content
        $finalOverview = $originalOverview;
        if (!empty($additionalContent)) {
            $finalOverview .= $additionalContent;
        }

        return [
            'overview' => $finalOverview,
            'itinerary' => $itinerary,
        ];
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('package_package_category')->truncate();
        DB::table('packages')->truncate();
    }
};
