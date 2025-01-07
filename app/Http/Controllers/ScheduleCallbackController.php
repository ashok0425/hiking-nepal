<?php

namespace App\Http\Controllers;

use App\Models\ScheduledCallback;
use App\Notifications\ScheduledCallbackNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class ScheduleCallbackController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $validated = $request->validate([
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:255',
            'comments' => 'nullable|string',
            'datepicker' => 'nullable|date|after_or_equal:today',
            'time_slot' => 'nullable|string',
            'duration' => 'nullable|integer',
            'user_timezone' => 'nullable|string',
            'callback_message' => 'nullable|string',
            'g-recaptcha-response' => 'nullable|string',
        ]);

        if ($validated['g-recaptcha-response']) {
            $recaptcha_response = $validated['g-recaptcha-response'];
            $recaptcha_response = json_decode(file_get_contents(
                "https://www.google.com/recaptcha/api/siteverify?secret=6LdphbAqAAAAAHkL6AX2jZWG8WE84W5e32Wzw5iN&response=" . $recaptcha_response
            ));

            if (!$recaptcha_response->success) {
                return redirect()->back()->withErrors(['g-recaptcha-response' => 'Invalid reCAPTCHA response']);
            }
        }

        $callback_message = sprintf(
            "Duration: %d mins, Timezone: %s\n%s",
            $validated['duration'] ?? '',
            $validated['user_timezone'] ?? '',
            $validated['callback_message'] ?? ''
        );

        $callback = ScheduledCallback::create([
            'status' => ScheduledCallback::STATUS_PENDING,
            'first_name' => $validated['firstName'],
            'last_name' => $validated['lastName'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'comments' => $validated['comments'],
            'callback_date' => $validated['datepicker'] ?? null,
            'callback_time' => $validated['time_slot'] ?? null,
            'callback_message' => $callback_message,
        ]);

        // Send notification to user
        Notification::route('mail', $callback->email)
            ->notify(new ScheduledCallbackNotification($callback));

        // Send notification to admin
        Notification::route('mail', config('mail.admin_address'))
            ->notify(new ScheduledCallbackNotification($callback, true));

        return redirect()->route('book-a-call', ['status' => 'submitted']);
    }
}
