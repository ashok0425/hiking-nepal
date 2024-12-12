<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

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

        DB::table('admins')->insert([
            'name' => 'Admin User',
            'email' => 'admin@email.com',
            'password' => Hash::make('password'), // Make sure to hash the password
            'email_verified_at' => now(),
            'remember_token' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
