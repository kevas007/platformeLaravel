<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TodosMail extends Mailable
{
    use Queueable, SerializesModels;
    public $store;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($store)
    {
        $this->store = $store;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('example@example.com')
        ->markdown('mail.invoice.paid');
    }
}
