<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class TourController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, $slug)
    {
        $tourPackage = Package::where('slug', $slug)
            ->where('status', 'published')
            ->with('place', 'destination')
            ->firstOrFail();

        $packages = Package::where('status', 'published')
            ->with('place', 'destination')
            ->take(2)
            ->get();

        return view('tours', compact('tourPackage', 'packages'));
    }
}
