<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AllTodo extends Mailable
{
    use Queueable, SerializesModels;
    public $taches;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($taches)
    {
        $this->taches = $taches;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('example@example.com')
            ->subject('Open Taks')
            ->markdown('mail.invoice.todos')
            ->with([
            'taches'=> $this->taches,
            ]);
    }
}
