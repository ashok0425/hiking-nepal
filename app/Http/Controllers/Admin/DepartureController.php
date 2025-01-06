<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Departure;
use App\Models\Package;
use Illuminate\Http\Request;

class DepartureController extends Controller
{
    public function index(Request $request)
    {
        $query = Departure::query();

        if ($request->has('q')) {
            $searchTerm = $request->query('q');
            $query->whereHas('package', function ($q) use ($searchTerm) {
                $q->where('name', 'LIKE', "%{$searchTerm}%");
            });
        }

        $departures = $query->with('package')->latest()->get();

        return view('admin.departures.index', compact('departures'));
    }

    public function create()
    {
        $packages = Package::all();

        return view('admin.departures.create', compact('packages'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'package_id' => 'required|exists:packages,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'total_seats' => 'required|integer|min:1',
            'booked_seats' => 'required|integer|min:0|lte:total_seats',
            'show_on_home_page' => 'nullable|boolean'
        ]);

        Departure::create($validated);

        return redirect()->route('admin.departures.index')
            ->with('success', 'Departure created successfully');
    }

    public function edit(Departure $departure)
    {
        $packages = Package::all();

        return view('admin.departures.edit', compact('departure', 'packages'));
    }

    public function update(Request $request, Departure $departure)
    {
        $validated = $request->validate([
            'package_id' => 'required|exists:packages,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'total_seats' => 'required|integer|min:1',
            'booked_seats' => 'required|integer|min:0|lte:total_seats',
            'show_on_home_page' => 'nullable|boolean'
        ]);

        $validated['show_on_home_page'] = $request->has('show_on_home_page');
        $departure->update($validated);

        return redirect()->route('admin.departures.index')
            ->with('success', 'Departure updated successfully');
    }

    public function destroy(Departure $departure)
    {
        $departure->delete();

        return redirect()->route('admin.departures.index')
            ->with('success', 'Departure deleted successfully');
    }
}
