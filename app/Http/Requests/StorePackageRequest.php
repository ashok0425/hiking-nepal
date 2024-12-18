<?php

namespace App\Http\Requests\Admin;

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
            'status' => ['required', Rule::in(['active', 'inactive'])],
            'activities' => ['nullable', 'string'],
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
            'sale_price_two_plus_per_person' => ['nullable', 'numeric', 'min:0'],
            'sale_price_eight_plus_per_person' => ['nullable', 'numeric', 'min:0'],
            'destination_id' => ['required', 'exists:destinations,id'],
            'place_id' => ['required', 'exists:places,id'],
            'overview' => ['required', 'string'],
            'itinerary' => ['nullable', 'string'],
            'faqs' => ['nullable', 'string'],
            'departures' => ['required', 'array', 'min:1'],
            'departures.*.from_date' => ['required', 'date'],
            'departures.*.to_date' => ['required', 'date', 'after_or_equal:departures.*.from_date'],
            'departures.*.days' => ['required', 'array', 'min:1'],
            'departures.*.days.*' => ['required', 'string', Rule::in(['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'])],
            'gallery' => ['nullable', 'array'],
            'gallery.*' => ['image', 'max:2048'],
            'categories' => ['required', 'array'],
            'categories.*' => ['exists:package_categories,id'],
            'meta_title' => ['nullable', 'string'],
            'meta_description' => ['nullable', 'string'],
            'meta_keywords' => ['nullable', 'string'],
        ];
    }
}
