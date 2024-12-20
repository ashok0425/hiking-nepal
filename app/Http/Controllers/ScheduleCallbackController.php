<?php

namespace App\Http\Controllers;

use App\Models\ScheduledCallback;
use Illuminate\Http\Request;

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
            'comments' => 'required|string',
            'datepicker' => 'required|date|after_or_equal:today',
            'time_slot' => 'required|string',
            'duration' => 'required|integer',
            'user_timezone' => 'required|string',
            'callback_message' => 'nullable|string',
        ]);

        $callback_message = sprintf(
            "Duration: %d mins, Timezone: %s\n%s",
            $validated['duration'],
            $validated['user_timezone'],
            $validated['callback_message'] ?? ''
        );

        ScheduledCallback::create([
            'status' => ScheduledCallback::STATUS_PENDING,
            'first_name' => $validated['firstName'],
            'last_name' => $validated['lastName'],
            'email' => $validated['email'],
            'comments' => $validated['comments'],
            'callback_date' => $validated['datepicker'],
            'callback_time' => $validated['time_slot'],
            'callback_message' => $callback_message,
        ]);

        return redirect()->route('book-a-call', ['status' => 'submitted']);
    }
}
