<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $validated = $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'contactNumber' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'nationality' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $booking = Booking::create([
            'first_name' => $validated['firstName'],
            'last_name' => $validated['lastName'],
            'contact_number' => $validated['contactNumber'],
            'email' => $validated['email'],
            'nationality' => $validated['nationality'],
            'message' => $validated['message'],
            'status' => Booking::STATUS_PENDING
        ]);

        return redirect()
            ->back()
            ->with('success', 'Your booking request has been submitted successfully. We will contact you soon.');
    }
}
