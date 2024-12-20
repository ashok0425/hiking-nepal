<?php

namespace App\Notifications;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class BookingNotification extends Notification implements ShouldQueue
{
    use Queueable;

    private $booking;
    private $isAdminNotification;

    public function __construct(Booking $booking, bool $isAdminNotification = false)
    {
        $this->booking = $booking;
        $this->isAdminNotification = $isAdminNotification;
    }

    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject($this->getEmailSubject())
            ->markdown('emails.booking', [
                'booking' => $this->booking,
                'isAdmin' => $this->isAdminNotification,
            ]);
    }

    private function getEmailSubject(): string
    {
        if ($this->isAdminNotification) {
            return 'New Booking Request - ' . $this->booking->first_name . ' ' . $this->booking->last_name;
        }

        return 'Your Booking Request Confirmation';
    }
}
