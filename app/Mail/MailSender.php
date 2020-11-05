<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailSender extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;


    /**
     * The body of the message.
     *
     * @var string
     */
    public $data;

    public $template;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data,$template)
    {
        $this->data = $data;
        $this->template= $template;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view($this->template)->subject('EPA')
            ->with('content', $this->data);
    }
}
