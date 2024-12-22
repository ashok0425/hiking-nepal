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
        $csvFile = database_path('reviews.csv');
        $content = file_get_contents($csvFile);

        // Fix potential line break issues by replacing multiple line breaks with a single one
        $content = preg_replace('/\r\n|\r|\n/u', "\n", $content);

        // Create a temporary file with the processed content
        $tmpFile = tmpfile();
        fwrite($tmpFile, $content);
        fseek($tmpFile, 0);

        // Get headers
        $headers = fgetcsv($tmpFile);

        while (($row = fgetcsv($tmpFile, 0, ",", '"', "\\")) !== false) {
            try {
                if (count($headers) !== count($row)) {
                    echo "Skipping row due to column mismatch. Expected " . count($headers) . " columns, got " . count($row) . " columns\n";
                    continue;
                }

                $data = array_combine($headers, $row);

                DB::table('reviews')->insert([
                    'package_id' => $data['product_id'],
                    'user_name' => $data['reviewer_name'],
                    'rating' => (int)$data['rating'],
                    'comment' => base64_decode($data['review_content']),
                    'status' => $data['status'] == 1 ? 'approved' : 'pending',
                    'created_at' => $data['review_date'],
                    'updated_at' => $data['review_date'],
                ]);
            } catch (\Exception $e) {
                // Log the error or handle it as needed
                echo "Error processing row: " . implode(',', $row) . "\n";
                echo "Error message: " . $e->getMessage() . "\n";
            }
        }

        // Close and remove the temporary file
        fclose($tmpFile);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('reviews')->truncate();
    }
};
