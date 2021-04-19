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
    public $key; 




    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($mail, $key)
    {
      $this->mail = $mail;
      $this->key = $key;
      print_r("key"); 
      print_r($key); 
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    { 
      
         Mail::to("$this->mail")->send(new ActivateAccountMail());
      
  }
}
