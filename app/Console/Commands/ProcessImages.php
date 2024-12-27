<?php

namespace App\Console\Commands;

use App\Services\ImageProcessingService;
use Illuminate\Console\Command;

class ProcessImages extends Command
{
    protected $signature = 'images:process {--directory=uploads} {--quality=80}';
    protected $description = 'Process JPG, JPEG, and PNG images into responsive WebP formats';

    public function handle(ImageProcessingService $imageService)
    {
        $directory = $this->option('directory');
        $quality = $this->option('quality');

        $this->info('Starting image processing...');
        $this->info('Target directory: ' . $directory);
        $this->info('Quality setting: ' . $quality);
        $this->info('Supported formats: JPG, JPEG, PNG');

        $imageService
            ->setSourcePath($directory)
            ->setQuality($quality)
            ->setRecursive(true)
            ->processImages();

        $this->newLine();
        $this->info('Image processing completed successfully!');
        $this->info('Created WebP versions in the following sizes: XS(320px), SM(640px), MD(768px), LG(1024px), XL(1280px)');
    }
}
