<?php

namespace App\Mail;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailable;
use Illuminate\Bus\Queueable;
use App\Sale;
use App\Shop;

class ReceiptMail extends Mailable
{
    use Queueable, SerializesModels;

    public $sale;

    public $shop;

    public function __construct(Sale $sale)
    {
        $this->sale = $sale;
        $this->shop = Shop::first();
    }

    public function build()
    {
        return $this->subject('Receipt for Your Purchase')
                    ->view('emails.receipt')
                    ->with([
                        'sale' => $this->sale,
                    ]);
    }
}
