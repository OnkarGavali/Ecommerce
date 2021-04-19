<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $OrdersInfo;
    public $mail; 

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($OrdersInfo)
    {    
        $this->OrdersInfo = $OrdersInfo; 
        }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    { 
        return $this->from('john@webslesson.info')->subject("Order has been accepted")->view('EmailTemplate/OrderAccepted');
    }
}
