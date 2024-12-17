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
        $csvFile = database_path('places.csv');
        $handle = fopen($csvFile, 'r');

        // Get headers and create associative array
        $headers = fgetcsv($handle);

        while (($row = fgetcsv($handle)) !== false) {
            $data = array_combine($headers, $row);

            $destination = DB::table('destinations')
                ->where('slug', $data['parent_slug'])
                ->first();

            if ($destination) {
                DB::table('places')->insert([
                    'name' => $data['name'],
                    'slug' => $data['slug'],
                    'description' => $data['description'] ?: null,
                    'destination_id' => $destination->id,
                    'status' => 'active',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        fclose($handle);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('places')->truncate();
    }
};
