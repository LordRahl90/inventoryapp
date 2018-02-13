<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class MerchantRegistered extends Mailable
{
    use Queueable, SerializesModels;

    public $merchant;


    /**
     * Ceates a new Message Instance
     *
     * MerchantRegistered constructor.
     * @param User $merchant
     */
    public function __construct(User $merchant)
    {
        $this->merchant=$merchant;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        Log::info("I am sending a mail soon");
        return $this->view('merchant.emils.newMerchant');
    }
}
