<?php

namespace App\Observers;

use App\Mail\NewsletterPostMail;
use App\Models\NewsletterPost;
use App\Models\NewsletterSubscriber;
use Illuminate\Support\Facades\Mail;

class NewsletterPostObserver
{
    /**
     * Handle the NewsletterPost "created" event.
     */
    public function created(NewsletterPost $newsletterPost): void
    {
        //
    }

    /**
     * Handle the NewsletterPost "updated" event.
     */
    public function updated(NewsletterPost $newsletterPost): void
    {
        if (
            $newsletterPost->status === 'published' &&
            $newsletterPost->wasChanged('status')
        ) {

            // Get all active subscribers
            $subscribers = NewsletterSubscriber::where('status', 'subscribed')->get();

            // Send email to each subscriber
            foreach ($subscribers as $subscriber) {
                Mail::to($subscriber->email)->queue(new NewsletterPostMail($newsletterPost));
            }
        }
    }

    /**
     * Handle the NewsletterPost "deleted" event.
     */
    public function deleted(NewsletterPost $newsletterPost): void
    {
        //
    }

    /**
     * Handle the NewsletterPost "restored" event.
     */
    public function restored(NewsletterPost $newsletterPost): void
    {
        //
    }

    /**
     * Handle the NewsletterPost "force deleted" event.
     */
    public function forceDeleted(NewsletterPost $newsletterPost): void
    {
        //
    }
}
