<?php

namespace App\Mail;

use App\Models\Event;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMessageToAttendeesMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $content;
    public $event;
    public $email_logo;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, $content, Event $event)
    {
        $this->subject = $subject;
        $this->content = $content;
        $this->event = $event;
        $this->email_logo = $event->organiser->full_logo_path;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subject)
                    ->from(config('attendize.outgoing_email_noreply'), $this->event->organiser->name)
                    ->replyTo($this->event->organiser->email, $this->event->organiser->name)
                    ->view('Emails.MessageToAttendees');
    }
}
