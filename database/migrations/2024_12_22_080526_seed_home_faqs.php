<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $faqsText = "## What should I pack for a trek?
        Pack comfortable clothing, sturdy hiking boots, a waterproof jacket, a first-aid kit, snacks, and a reusable water bottle.

        ## Are guided tours suitable for beginners?
        Yes, our guided tours are perfect for beginners. Our experienced guides provide comprehensive instruction, set an appropriate pace, and ensure your safety throughout the journey.

        ## How do I book a tour?
        You can book a tour through our website by browsing available packages, selecting your preferred dates, and completing the secure online booking process. You can also contact our team directly for assistance.

        ## What is the group size for treks?
        Our trek groups typically range from 4 to 12 people to ensure personalized attention and a comfortable group dynamic while maintaining the social aspect of the experience.

        ## Is travel insurance required?
        Yes, travel insurance is strongly recommended for all our tours and treks. It should cover emergency evacuation, trip cancellation, and medical expenses during your journey.";

        DB::table('page_sections')->updateOrInsert(
            ['key' => 'home_faqs'],
            ['value' => $faqsText]
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('page_sections')->where('key', 'home_faqs')->delete();
    }
};
