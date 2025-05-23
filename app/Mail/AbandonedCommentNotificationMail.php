<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\AbandonedComment;

class AbandonedCommentNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $comment;

    /**
     * Create a new message instance.
     */
    public function __construct(AbandonedComment $comment)
    {
        $this->comment = $comment;
    }

    /**
     * Get the message envelope.
     * 件名や差出人
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'あなたの投稿に新しいコメントがあります',
        );
    }

    /**
     * Get the message content definition.
     * 本文ビューなど
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.abandoned_comment',
            with: ['comment' => $this->comment]
        );
    }

    /**
     * Get the attachments for the message.
     * 添付ファイル
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
