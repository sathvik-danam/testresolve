<?php

namespace App\Models\Mail;

use Illuminate\Bus\Queueable;
//use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Mail\Mailable;
use Illuminate\Contracts\Queue\ShouldQueue;

class InvitationSentMail extends Mailable
{
    use Queueable, SerializesModels;
    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */ 
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('support@reslove.com')->subject('Invitation Created')->view('invitation_sender_email_template')->with('data', $this->data);
    }
}
 