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
            'fitness_level' => ['required_if:status,published', 'nullable', 'string'],
            'max_elevation' => ['required_if:status,published', 'nullable', 'string'],
            'commute' => ['required_if:status,published', 'nullable', 'string'],
            'best_time' => ['required_if:status,published', 'nullable', 'string'],
            'group_size' => ['required_if:status,published', 'nullable', 'string'],
            'arrival_at' => ['required_if:status,published', 'nullable', 'string'],
            'departure_from' => ['required_if:status,published', 'nullable', 'string'],
            'meal' => ['required_if:status,published', 'nullable', 'string'],
            'tour_duration' => ['required_if:status,published', 'nullable', 'string'],
            'stay' => ['required_if:status,published', 'nullable', 'string'],
            'price' => ['required', 'numeric', 'min:0'],
            'sale_price_per_person' => ['required', 'numeric', 'min:0'],
            'sale_price_two_plus_per_person' => ['required_if:status,published', 'nullable', 'numeric', 'min:0'],
            'sale_price_eight_plus_per_person' => ['required_if:status,published', 'nullable', 'numeric', 'min:0'],
            'destination_id' => ['required', 'exists:destinations,id'],
            'place_id' => ['required', 'exists:places,id'],
            'overview' => ['required', 'string'],
            'itinerary' => ['required_if:status,published', 'nullable', 'string'],
            'faqs' => ['required_if:status,published', 'nullable', 'string'],
            'departures' => ['required_if:status,published', 'nullable', 'array'],
            'departures.*.from_date' => ['required', 'date'],
            'departures.*.to_date' => ['required', 'date', 'after_or_equal:departures.*.from_date'],
            'gallery' => ['required_if:status,published', 'nullable', 'array'],
            'gallery.*' => ['image', 'max:2048'],
            'categories' => ['required', 'array'],
            'categories.*' => ['exists:package_categories,id'],
            'activities' => ['nullable', 'array'],
            'activities.*' => ['exists:activities,id'],
            'show_in_nav' => ['nullable', 'boolean'],
            'meta_title' => ['required_if:status,published', 'nullable', 'string'],
            'meta_description' => ['required_if:status,published', 'nullable', 'string'],
            'meta_keywords' => ['required_if:status,published', 'nullable', 'string'],
        ];
    }
}
