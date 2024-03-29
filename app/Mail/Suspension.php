<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Suspension extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('compliance@tradingview.sigiandco.com', 'SIGI&CO: Account suspension')
            ->view('emails.verification.suspension')->with([
                'first_name' => $this->user->userProfile->first_name,
                'last_name' => $this->user->userProfile->last_name,
            ]);
    }
}
