<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SupportMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $title;
    public $description;

    /**
     * Create a new message instance.
     *
     * @param  string  $title
     * @param  string  $description
     * @param  string  $userEmail
     * @return void
     */
    public function __construct($title, $description, $userEmail)
    {
        $this->title = $title;
        $this->description = $description;
        $this->userEmail = $userEmail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->userEmail)
            ->subject('Support message')
            ->view('emails.support-message');
    }
}
