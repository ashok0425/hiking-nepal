<?php

namespace App\Notifications;

use App\Models\ScheduledCallback;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ScheduledCallbackNotification extends Notification implements ShouldQueue
{
    use Queueable;

    private $callback;
    private $isAdminNotification;

    public function __construct(ScheduledCallback $callback, bool $isAdminNotification = false)
    {
        $this->callback = $callback;
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
            ->markdown('emails.scheduled-callback', [
                'callback' => $this->callback,
                'isAdmin' => $this->isAdminNotification,
            ]);
    }

    private function getEmailSubject(): string
    {
        if ($this->isAdminNotification) {
            return 'New Callback Request - ' . $this->callback->first_name . ' ' . $this->callback->last_name;
        }

        return 'Your Callback Request Confirmation';
    }
}
