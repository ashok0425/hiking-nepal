<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $packages = Package::where('status', 'published')
            ->with('place', 'destination')
            ->take(6)
            ->get();

        return view('home.index', compact('packages'));
    }
}
