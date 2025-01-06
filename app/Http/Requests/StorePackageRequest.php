<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePackageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
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
            'departures.*.total_seats' => ['required', 'integer', 'min:1'],
            'departures.*.booked_seats' => ['required', 'integer', 'min:0', 'lte:departures.*.total_seats'],
            'departures.*.show_on_home_page' => ['nullable', 'boolean'],
            'gallery' => ['nullable', 'array'],
            'gallery.*' => ['image', 'max:2048'],
            'categories' => ['nullable', 'array'],
            'categories.*' => ['exists:package_categories,id'],
            'activities' => ['nullable', 'array'],
            'activities.*' => ['exists:activities,id'],
            'show_in_nav' => ['nullable', 'boolean'],
            'meta_title' => 'nullable|string|max:255',
            'meta_keyword' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'perks' => ['nullable', 'string'],
            'map' => ['nullable', 'image', 'max:2048'],
            'alt_chart' => ['nullable', 'image', 'max:2048'],
            'video' => ['nullable', 'string', 'url'],
        ];
    }
}
