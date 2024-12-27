<?php

namespace App\Services;

use Intervention\Image\Laravel\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Encoders\WebpEncoder;
use Symfony\Component\Finder\Finder;

class ImageProcessingService
{
    protected $sizes = [
        'xs' => 320,
        'sm' => 640,
        'md' => 768,
        'lg' => 1024,
        'xl' => 1280,
    ];

    protected $quality = 80;
    protected $sourcePath;
    protected $allowedExtensions = ['jpg', 'jpeg', 'png'];
    protected $recursive = false;
    protected $maxOriginalWidth = 1080;

    public function processImages()
    {
        $fullPath = $this->getFullPath($this->sourcePath);

        if (!is_dir($fullPath)) {
            throw new \RuntimeException("Directory not found: {$this->sourcePath}");
        }

        $files = $this->getFiles($fullPath);

        foreach ($files as $file) {
            if ($this->isValidImage($file)) {
                $this->processImage($file);
            }
        }
    }

    protected function getFullPath($path)
    {
        // Clean the path and make it relative to base_path
        $path = trim($path, '/');
        return base_path($path);
    }

    protected function getFiles($directory)
    {
        $finder = new Finder();
        $files = [];

        try {
            $finder->files()
                ->in($directory)
                ->name($this->getAllowedExtensionPatterns());

            if (!$this->recursive) {
                $finder->depth(0);
            }

            foreach ($finder as $file) {
                $files[] = $file->getRealPath();
            }

            Log::info('Found ' . count($files) . ' files to process');

            return $files;
        } catch (\Exception $e) {
            Log::error('Error finding files: ' . $e->getMessage());
            return [];
        }
    }

    protected function getAllowedExtensionPatterns(): array
    {
        $patterns = [];
        foreach ($this->allowedExtensions as $ext) {
            // Add both lowercase and uppercase patterns
            $patterns[] = '*.' . strtolower($ext);
            $patterns[] = '*.' . strtoupper($ext);
        }
        return $patterns;
    }

    protected function isValidImage($file)
    {
        $fileName = basename($file);
        return !Str::contains($fileName, ['-xs.', '-sm.', '-md.', '-lg.', '-xl.']);
    }

    protected function processImage($imagePath)
    {
        try {
            // Get image info
            $directory = dirname($imagePath);
            $fileName = basename($imagePath);
            $fileNameWithoutExt = pathinfo($fileName, PATHINFO_FILENAME);

            Log::info('Processing image: ' . $imagePath);

            // Load the image using Laravel facade
            $image = Image::read($imagePath);

            // First, save the original size (max 1080w) in WebP format
            $originalWebpFileName = sprintf(
                '%s/%s.webp',
                $directory,
                $fileNameWithoutExt
            );

            // Create a copy for the original size
            $originalImage = clone $image;

            // If width is larger than maxOriginalWidth, scale it down
            if ($originalImage->width() > $this->maxOriginalWidth) {
                $originalImage->scale(width: $this->maxOriginalWidth);
            }

            // Save original (possibly scaled) as WebP with specified quality
            $originalImage->encode(new WebpEncoder($this->quality))
                ->save($originalWebpFileName);

            Log::info('Created original size (max 1080w): ' . $originalWebpFileName);

            foreach ($this->sizes as $size => $width) {
                // Generate new filename
                $webpFileName = sprintf(
                    '%s/%s-%s.webp',
                    $directory,
                    $fileNameWithoutExt,
                    $size
                );

                // Create a scaled version of the image
                $scaled = clone $image;

                // Scale the image to the target width while maintaining aspect ratio
                $scaled->scale(width: $width);

                // Save as WebP with specified quality
                $scaled->encode(new WebpEncoder($this->quality))
                    ->save($webpFileName);

                Log::info('Created: ' . $webpFileName);
            }

            return true;
        } catch (\Exception $e) {
            Log::error('Image processing failed for ' . $imagePath . ': ' . $e->getMessage());
            return false;
        }
    }

    // Setter methods with fluent interface
    public function setSizes(array $sizes): self
    {
        $this->sizes = $sizes;
        return $this;
    }

    public function setQuality(int $quality): self
    {
        $this->quality = $quality;
        return $this;
    }

    public function setSourcePath(string $path): self
    {
        $this->sourcePath = $path;
        return $this;
    }

    public function setRecursive(bool $recursive): self
    {
        $this->recursive = $recursive;
        return $this;
    }

    public function setMaxOriginalWidth(int $width): self
    {
        $this->maxOriginalWidth = $width;
        return $this;
    }
}
