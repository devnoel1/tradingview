<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PasswordRecovery extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $password;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, $password = "")
    {
        $this->user = $user;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('support@tradingview.sigiandco.com', 'SIGI&CO: Successfully password recovered ')
            ->view('emails.user.passwordrecovery')->with([
                'first_name' => $this->user->userProfile->first_name,
                'last_name' => $this->user->userProfile->last_name,
                'password' => $this->password,
            ]);
    }
}
