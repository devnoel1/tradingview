<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WithdrawelNotification extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $withdrawal_amount;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, $withdrawal_amount = "")
    {
        $this->user = $user;
        $this->withdrawal_amount = $withdrawal_amount;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('support@tradingview.sigiandco.com', 'SIGI&CO: Your margin account is now active')
            ->view('emails.balance.withdrawelnotification')->with([
                'username' => $this->user->email,
                'withdrawal_amount' => $this->withdrawal_amount,
            ]);
    }
}
