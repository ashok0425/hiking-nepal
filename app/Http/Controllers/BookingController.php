<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Package;
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
            // 'nationality' => 'required|string|max:255',
            'message' => 'required|string',
            'amount'=>'nullable|integer',
            'type'=>'nullable|integer',
            'package'=>'nullable|integer',
            'g-recaptcha-response' => 'required|string',

        ]);
 if (isset($validated['g-recaptcha-response'])) {
            $recaptcha_response = $validated['g-recaptcha-response'];
            $recaptcha_response = json_decode(file_get_contents(
                "https://www.google.com/recaptcha/api/siteverify?secret=6LdphbAqAAAAAHkL6AX2jZWG8WE84W5e32Wzw5iN&response=" . $recaptcha_response
            ));

            if (!$recaptcha_response->success) {
                return redirect()->back()->withErrors(['g-recaptcha-response' => 'Invalid reCAPTCHA response']);
            }
        }
        $booking = Booking::create([
            'first_name' => $validated['firstName'],
            'last_name' => $validated['lastName'],
            'contact_number' => $validated['contactNumber'],
            'email' => $validated['email'],
            // 'nationality' => $validated['nationality'],
            'message' => $validated['message'],
            'status' => Booking::STATUS_PENDING,
            'amount'=>$validated['amount']??0,
            'type'=>$validated['type']??1,
            'package_id'=>$validated['package'],

        ]);

        Notification::route('mail', 'info@hikingnepal.com')
            ->notify(new BookingNotification($booking, true));

        Notification::route('mail', $booking->email)
            ->notify(new BookingNotification($booking, false));
        $package=Package::find($validated['package'])?->title??'package booking';
            if($request->type==2)
            return redirect("https://pay.hikingnepal.com?productName=$package&currency=USD&amount=$booking->amount");

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
        return view('success');

        return [];
    }
     public function failed(Request $request)
    {
        return view('failed');
    }
}
