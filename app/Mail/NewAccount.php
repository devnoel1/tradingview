<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewAccount extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $account_name;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, $account_name = "Account")
    {
        $this->user = $user;
        $this->account_name = $account_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('support@tradingview.sigiandco.com', 'SIGI&CO: Your new account is now active')
            ->view('emails.user.newaccount')->with([
                'first_name' => $this->user->userProfile->first_name,
                'last_name' => $this->user->userProfile->last_name,
                'account_name' => $this->account_name,
            ]);
    }
}
