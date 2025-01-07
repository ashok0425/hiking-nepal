<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Package;
use App\Models\Review;
use App\Models\ScheduledCallback;
use Illuminate\Support\Facades\Cache;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $metrics = Cache::remember('dashboard_metrics', 3600, function () {
            return [
                'bookings' => [
                    'total' => Booking::count(),
                    'pending' => Booking::where('status', Booking::STATUS_PENDING)->count(),
                    'confirmed' => Booking::where('status', Booking::STATUS_CONFIRMED)->count(),
                    'recent' => Booking::latest()->take(5)->get()
                ],

                'callbacks' => [
                    'pending' => ScheduledCallback::where('status', ScheduledCallback::STATUS_PENDING)->count(),
                    'scheduled' => ScheduledCallback::where('status', ScheduledCallback::STATUS_SCHEDULED)->count(),
                    'upcoming' => ScheduledCallback::whereIn('status', [
                        ScheduledCallback::STATUS_PENDING,
                        ScheduledCallback::STATUS_SCHEDULED
                    ])->orderBy('callback_date')->take(5)->get()
                ],

                'packages' => [
                    'total' => Package::count(),
                    'active' => Package::where('status', 'published')->count(),
                    'popular' => Package::withCount('reviews')
                        ->orderBy('reviews_count', 'desc')
                        ->take(5)
                        ->get()
                ],

                'reviews' => [
                    'total' => Review::count(),
                    'average_rating' => Review::avg('rating'),
                    'recent' => Review::latest()->take(5)->get()
                ],

                'departures' => [
                    'upcoming' => Package::with(['departures' => function ($query) {
                        $query->where('start_date', '>', now())
                            ->orderBy('start_date')
                            ->take(5);
                    }])->has('departures')->get()
                ]
            ];
        });

        return view('admin.dashboard', compact('metrics'));
    }
}
