<?php

namespace App\Jobs;

use App\Mail\CheckoutMail;
use App\Mail\ThankEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendMailCheckout implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $email, $mailData, $payment, $order_id;
    /**
     * Create a new job instance.
     */
    public function __construct($email, $mailData, $order_id, $payment)
    {
        $this->email = $email;
        $this->mailData = $mailData;
        $this->order_id = $order_id;
        $this->payment = $payment;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->email)->send(new CheckoutMail($this->mailData, $this->order_id, $this->payment));
        Mail::to($this->email)->send(new ThankEmail('Cảm ơn bạn vì đã thanh toán', 'Hãy đánh giá nếu bạn hài lòng'));
    }
}
