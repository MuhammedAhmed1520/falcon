<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class KnetPayment extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $pay;

    /**
     * Create a new message instance.
     *
     * @param $pay
     */
    public function __construct($pay)
    {
        $this->pay = $pay;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.knet-payment');
    }
}
