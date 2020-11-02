<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Contact extends Mailable
{
    use Queueable, SerializesModels;

    public $sender_e, $sender_n;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($sender_e,$sender_n)
    {
        $this->sender_e = $sender_e;
        $this->sender_n = $sender_n;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->from($this->sender_e, $this->sender_n)
        ->markdown('mail.contact')
        ->with('message', 'Assalau');
    }
}
