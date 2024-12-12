<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateWebsitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('websites', function (Blueprint $table) {
            $table->id();
            $table->float('comission')->default(0);
            $table->string('title')->nullable();
            $table->string('descr')->nullable();
            $table->string('keyword')->nullable();
            $table->string('url')->nullable();
            $table->string('image')->nullable();
            $table->string('fev')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();
            $table->string('linkdin')->nullable();
            $table->string('pinterest')->nullable();
            $table->string('tiktok')->nullable();
            $table->integer('tax')->nullable();

            $table->timestamps();
        });

        DB::table('websites')->insert([
            'comission' => 5.0,
            'title' => 'Sample Website',
            'descr' => 'A simple website description.',
            'keyword' => 'sample, website',
            'url' => 'https://www.samplewebsite.com',
            'image' => 'sample-image.jpg',
            'fev' => 'sample-favicon.ico',
            'phone' => '123-456-7890',
            'email' => 'info@samplewebsite.com',
            'address' => '123 Sample Street, Sample City, SC 12345',
            'facebook' => 'https://www.facebook.com/samplewebsite',
            'twitter' => 'https://twitter.com/samplewebsite',
            'instagram' => 'https://www.instagram.com/samplewebsite',
            'youtube' => 'https://www.youtube.com/samplewebsite',
            'linkdin' => 'https://www.linkedin.com/company/samplewebsite',
            'pinterest' => 'https://www.pinterest.com/samplewebsite',
            'tiktok' => 'https://www.tiktok.com/@samplewebsite',
            'tax' => 20,
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('websites');
    }
}
