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
        $galleryRules = $this->status === 'active' && !$this->hasAnyExistingGalleryImages()
            ? ['required', 'array']
            : ['nullable', 'array'];

        return [
            'title' => ['required', 'string', 'max:255'],
            'status' => ['required', Rule::in(['active', 'inactive'])],
            'activities' => ['required_if:status,active', 'nullable', 'string'],
            'fitness_level' => ['required_if:status,active', 'nullable', 'string'],
            'max_elevation' => ['required_if:status,active', 'nullable', 'string'],
            'commute' => ['required_if:status,active', 'nullable', 'string'],
            'best_time' => ['required_if:status,active', 'nullable', 'string'],
            'group_size' => ['required_if:status,active', 'nullable', 'string'],
            'arrival_at' => ['required_if:status,active', 'nullable', 'string'],
            'departure_from' => ['required_if:status,active', 'nullable', 'string'],
            'meal' => ['required_if:status,active', 'nullable', 'string'],
            'tour_duration' => ['required_if:status,active', 'nullable', 'string'],
            'stay' => ['required_if:status,active', 'nullable', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'sale_price_per_person' => ['required', 'numeric', 'min:0'],
            'sale_price_two_plus_per_person' => ['required_if:status,active', 'nullable', 'numeric', 'min:0'],
            'sale_price_eight_plus_per_person' => ['required_if:status,active', 'nullable', 'numeric', 'min:0'],
            'destination_id' => ['required', 'exists:destinations,id'],
            'place_id' => ['required', 'exists:places,id'],
            'overview' => ['required', 'string'],
            'itinerary' => ['required_if:status,active', 'nullable', 'string'],
            'faqs' => ['required_if:status,active', 'nullable', 'string'],
            'departures' => ['required_if:status,active', 'nullable', 'array'],
            'new_gallery' => $galleryRules,
            'new_gallery.*' => ['image', 'max:2048'],
            'remove_gallery' => ['nullable', 'array'],
            'categories' => ['required', 'array'],
            'categories.*' => ['exists:package_categories,id'],
            'meta_title' => ['required_if:status,active', 'nullable', 'string'],
            'meta_description' => ['required_if:status,active', 'nullable', 'string'],
            'meta_keywords' => ['required_if:status,active', 'nullable', 'string'],
        ];
    }

    private function hasAnyExistingGalleryImages(): bool
    {
        $package = $this->route('package');
        return $package && $package->gallery && count($package->gallery) > 0;
    }
}
