<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Mail\OrderRejectedMail;
use Illuminate\Support\Facades\Mail;

class OrderRejectedJob implements ShouldQueue
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
        echo $OrdersInfo; 
    }

    /** 
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        echo "dollu";
        echo $this->OrdersInfo; 
        echo "hi"; 
        Mail::to("$this->mail")->send(new OrderRejectedMail($this->OrdersInfo));
    }
}
