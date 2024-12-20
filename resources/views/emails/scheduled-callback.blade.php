@component('mail::message')
# {{ $isAdmin ? 'New Callback Request' : 'Your Callback Request Confirmation' }}

@if(!$isAdmin)
Thank you for scheduling a callback with us. We have received your request and will contact you at the scheduled time.
@else
A new callback request has been received.
@endif

**Callback Details:**

- Name: {{ $callback->first_name }} {{ $callback->last_name }}
- Email: {{ $callback->email }}
- Date: {{ \Carbon\Carbon::parse($callback->callback_date)->format('l, F j, Y') }}
- Time: {{ $callback->callback_time }}
@if(!$isAdmin)
- Please note all times are in your local timezone ({{ explode(',', $callback->callback_message)[1] ?? 'Unknown' }})
@else
- Timezone: {{ explode(',', $callback->callback_message)[1] ?? 'Unknown' }}
@endif

**Additional Information:**
{{ $callback->comments }}

@if($isAdmin)
**Callback Notes:**

- {{ $callback->callback_message }}
@else
If you need to make any changes to your scheduled callback, please contact us as soon as possible.
@endif

@if(!$isAdmin)
We look forward to speaking with you!
@endif

Thanks,<br>
{{ config('app.name') }}
@endcomponent
