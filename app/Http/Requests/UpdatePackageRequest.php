<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePackageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $galleryRules = $this->status === 'active' && ! $this->hasAnyExistingGalleryImages()
            ? ['required', 'array']
            : ['nullable', 'array'];

        return [
            'title' => ['required', 'string', 'max:255'],
            'status' => ['required', Rule::in(['draft', 'published', 'private'])],
            'fitness_level' => ['nullable', 'string'],
            'max_elevation' => ['nullable', 'string'],
            'commute' => ['nullable', 'string'],
            'best_time' => ['nullable', 'string'],
            'group_size' => ['nullable', 'string'],
            'arrival_at' => ['nullable', 'string'],
            'departure_from' => ['nullable', 'string'],
            'meal' => ['nullable', 'string'],
            'tour_duration' => ['nullable', 'string'],
            'stay' => ['nullable', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'sale_price_per_person' => ['required', 'numeric', 'min:0'],
            'sale_price_two_plus_per_person' => ['required_if:status,published', 'nullable', 'numeric', 'min:0'],
            'sale_price_eight_plus_per_person' => ['required_if:status,published', 'nullable', 'numeric', 'min:0'],
            'destination_id' => ['required', 'exists:destinations,id'],
            'place_id' => ['required', 'exists:places,id'],
            'overview' => ['required', 'string'],
            'itinerary' => ['nullable', 'string'],
            'faqs' => ['nullable', 'string'],
            'departures' => ['nullable', 'array'],
            'departures.*.from_date' => ['required', 'date'],
            'departures.*.to_date' => ['required', 'date', 'after_or_equal:departures.*.from_date'],
            'new_gallery' => $galleryRules,
            'new_gallery.*' => ['image', 'max:2048'],
            'remove_gallery' => ['nullable', 'array'],
            'categories' => ['nullable', 'array'],
            'categories.*' => ['exists:package_categories,id'],
            'activities' => ['nullable', 'array'],
            'activities.*' => ['exists:activities,id'],
            'show_in_nav' => ['nullable', 'boolean'],
            'meta_title' => ['nullable', 'string'],
            'meta_description' => ['nullable', 'string'],
            'meta_keywords' => ['nullable', 'string'],
            'perks' => ['nullable', 'string'],
            'map' => ['nullable', 'image', 'max:2048'],
            'alt_chart' => ['nullable', 'image', 'max:2048'],
            'video' => ['nullable', 'string', 'url'],
            'remove_map' => ['nullable', 'boolean'],
            'remove_alt_chart' => ['nullable', 'boolean'],
        ];
    }

    private function hasAnyExistingGalleryImages(): bool
    {
        $package = $this->route('package');

        return $package && $package->gallery && count($package->gallery) > 0;
    }
}
