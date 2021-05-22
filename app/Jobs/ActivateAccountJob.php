<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\ActivateAccountMail;
use App\Mail\OrderConfirmationMail;
use App\Mail\OrderRejectedMail;
use App\Mail\OrderDeliveredMail;
use Illuminate\Support\Facades\Mail;

class ActivateAccountJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $mail;
    public $password; 




    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($mail, $password)
    {
      $this->mail = $mail;
      $this->password = $password;
      
      
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    { 
      
         Mail::to("$this->mail")->send(new ActivateAccountMail($this->password));
      
  }
}
