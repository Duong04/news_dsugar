<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class CensorshipNotice extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    private $title;
    private $name;
    private $status;
    private $created_at;
    private $reviewed_at;
    private $note;
    public function __construct($title, $name, $status, $created_at, $reviewed_at, $note = null)
    {
        $this->title = $title;
        $this->name = $name;
        $this->status = $status;
        $this->created_at = $created_at;
        $this->reviewed_at = $reviewed_at;
        $this->note = $note;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Thông báo kiểm duyệt',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.censorshipNotice',
            with: [
                'title' => $this->title,
                'name' => $this->name,
                'status' => $this->status,
                'created_at' => $this->created_at,
                'reviewed_at' => $this->reviewed_at,
                'note' => $this->note,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
