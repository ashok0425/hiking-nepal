<?php

namespace App\Console\Commands;

use App\Services\ImageProcessingService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ProcessImages extends Command
{
    protected $signature = 'images:process {--directory=uploads} {--quality=80}';
    protected $description = 'Process JPG, JPEG, and PNG images into responsive WebP formats';

    public function handle(ImageProcessingService $imageService)
    {
        $directory = $this->option('directory');
        $quality = $this->option('quality');

        if (!Storage::exists($directory)) {
            $this->error("Directory '{$directory}' does not exist!");
            return 1;
        }

        $this->info('Starting image processing...');
        $this->info('Target directory: ' . $directory);
        $this->info('Quality setting: ' . $quality);
        $this->info('Supported formats: JPG, JPEG, PNG');

        $bar = $this->output->createProgressBar(
            count(array_filter(
                Storage::files($directory),
                fn($file) => in_array(strtolower(pathinfo($file, PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png'])
            ))
        );

        $imageService
            ->setSourceDirectory($directory)
            ->setQuality($quality)
            ->processImages();

        $bar->finish();

        $this->newLine();
        $this->info('Image processing completed successfully!');
        $this->info('Created WebP versions in the following sizes: XS(320px), SM(640px), MD(768px), LG(1024px), XL(1280px)');
    }
}
