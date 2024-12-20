<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $query = Booking::query();

        // Search functionality
        if ($request->has('q')) {
            $searchTerm = $request->query('q');
            $query->where(function ($q) use ($searchTerm) {
                $q->where('first_name', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('last_name', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('email', 'LIKE', "%{$searchTerm}%");
            });
        }

        // Filter by status if needed
        if ($request->has('status')) {
            $query->where('status', $request->query('status'));
        }

        $bookings = $query->latest()->paginate(10);

        return view('admin.bookings.index', compact('bookings'));
    }

    public function create()
    {
        return view('admin.bookings.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'contact_number' => 'required|max:255',
            'email' => 'required|email|max:255',
            'nationality' => 'required|max:255',
            'message' => 'required',
            'status' => ['required', Rule::in(Booking::getStatuses())],
        ]);

        Booking::create($validated);

        return redirect()->route('admin.bookings.index')
            ->with('success', 'Booking created successfully');
    }

    public function edit(Booking $booking)
    {
        return view('admin.bookings.edit', compact('booking'));
    }

    public function update(Request $request, Booking $booking)
    {
        $validated = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'contact_number' => 'required|max:255',
            'email' => 'required|email|max:255',
            'nationality' => 'required|max:255',
            'message' => 'required',
            'status' => ['required', Rule::in(Booking::getStatuses())],
        ]);

        $booking->update($validated);

        return redirect()->route('admin.bookings.index')
            ->with('success', 'Booking updated successfully');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()->route('admin.bookings.index')
            ->with('success', 'Booking deleted successfully');
    }
}
