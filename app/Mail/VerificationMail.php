<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class VerificationMail extends Mailable
{
    use Queueable, SerializesModels;
    public $code;
    public $id_user;
    /**
     * Create a new message instance.
     */
    public function __construct($id,$co)
    {
        $this->code=$co;
        $this->id_user=$id;
    }

    public function build()
    {
        return $this->subject('no reply')
                ->view('emails.verification')
                ->with([
                    'verificationLink' => 'http://127.0.0.1:8000/user/verify/?verification=' . $this->code . '&id=' . $this->id_user,
                ]);
    }

    
}
