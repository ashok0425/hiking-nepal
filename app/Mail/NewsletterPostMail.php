<?php

namespace App\Mail;

use App\Models\NewsletterPost;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewsletterPostMail extends Mailable
{
    use Queueable, SerializesModels;

    public $newsletterPost;

    /**
     * Create a new message instance.
     */
    public function __construct(NewsletterPost $newsletterPost)
    {
        $this->newsletterPost = $newsletterPost;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->newsletterPost->title,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.newsletter-post',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
