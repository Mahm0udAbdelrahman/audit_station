<?php

namespace Modules\Auth\Emails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ForgetOtpEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public  $otp;
    public function __construct($otp)
    {
       $this->otp = $otp;
    }


    /**
     * Build the message.
     */
    public function build(): self
    {
        return $this->view('email.forget_otp_email');
    }
}
