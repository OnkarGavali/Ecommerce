<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ActivateAccountMail extends Mailable
{
    use Queueable, SerializesModels;

    public $password;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($password)
    {
      
      $this->password = $password;
      
      
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('john@webslesson.info')->subject("Activate Your account")->view('EmailTemplate/ActivateAccount');
    }
}
