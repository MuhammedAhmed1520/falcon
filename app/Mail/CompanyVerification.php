<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class CompanyVerification extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $company;

    /**
     * Create a new message instance.
     *
     * @param $company
     */
    public function __construct($company)
    {
        $this->company = $company;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.company_verification');
    }
}
