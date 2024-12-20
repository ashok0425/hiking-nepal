@component('mail::message')
# {{ $isAdmin ? 'New Booking Request' : 'Your Booking Request Confirmation' }}

@if(!$isAdmin)
Thank you for your booking request. We have received your request and will review it shortly.
@else
A new booking request has been received.
@endif

**Booking Details:**

- Name: {{ $booking->first_name }} {{ $booking->last_name }}
- Email: {{ $booking->email }}
- Contact Number: {{ $booking->contact_number }}
- Nationality: {{ $booking->nationality }}

**Message:**
{{ $booking->message }}

@if($isAdmin)
**Booking Status:** {{ $booking->status }}
@else
We will process your booking request and contact you soon with further details.
@endif

@if(!$isAdmin)
If you need to make any changes to your booking or have any questions, please don't hesitate to contact us.
@endif

Thanks,<br>
{{ config('app.name') }}
@endcomponent
