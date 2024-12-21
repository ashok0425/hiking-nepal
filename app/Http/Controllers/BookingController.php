<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Notifications\BookingNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

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
            'status' => Booking::STATUS_PENDING,
        ]);

        Notification::route('mail', config('mail.admin_address'))
            ->notify(new BookingNotification($booking, true));

        Notification::route('mail', $booking->email)
            ->notify(new BookingNotification($booking, false));

        return redirect()
            ->back()
            ->with('success', 'Your booking request has been submitted successfully. We will contact you soon.');
    }

    public function handlePGWebhook(Request $request)
    {
        // Get the booking ID from the webhook payload
        // $bookingId = $request->input('booking_id');

        // Find the booking
        // $booking = Booking::findOrFail($bookingId);

        // Verify the payment signature/hash
        // if (!$this->verifyPaymentSignature($request)) {
        //     \Log::error('Invalid payment signature');
        //     return response()->json(['error' => 'Invalid signature'], 400);
        // }

        // Update booking status based on payment status
        // if ($request->input('payment_status') === 'success') {
        //     $booking->update(['status' => Booking::STATUS_CONFIRMED]);
        // } else {
        //     $booking->update(['status' => Booking::STATUS_FAILED]);
        // }

        return [];
    }
}
