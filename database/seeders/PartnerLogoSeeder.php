<?php

namespace Database\Seeders;

use App\Models\PartnerLogo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PartnerLogoSeeder extends Seeder
{
    public function run(): void
    {
        Storage::disk('public')->makeDirectory('partner_logos');

        for ($i = 1; $i <= 6; $i++) {
            $sourcePath = public_path("logo{$i}.png");

            $logo = [
                'name' => "Partner {$i}",
                'sort_order' => $i,
                'is_active' => true,
            ];

            if (File::exists($sourcePath)) {
                $storagePath = "partner_logos/logo{$i}.png";
                Storage::disk('public')->put($storagePath, File::get($sourcePath));
                $logo['logo'] = $storagePath;
            }

            PartnerLogo::create($logo);
        }
    }
}
