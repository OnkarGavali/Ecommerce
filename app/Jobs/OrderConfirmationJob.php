<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\OrderConfirmationMail;
use Illuminate\Support\Facades\Mail;

class OrderConfirmationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $mail;
    public $OrdersInfo; 
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($mail, $OrdersInfo)
    {
        $this->mail = $mail;    
        $this->OrdersInfo = $OrdersInfo;    
    }

    /** 
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to("$this->mail")->send(new OrderConfirmationMail($this->OrdersInfo));
    }
}
