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
        Schema::table('departures', function (Blueprint $table) {
            $table->boolean('show_on_home_page')->default(false);
            $table->integer('total_seats')->default(20);
            $table->integer('booked_seats')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('departures', function (Blueprint $table) {
            $table->dropColumn(['show_on_home_page', 'total_seats', 'booked_seats']);
        });
    }
};
