<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UpcomingMarginCall extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $dateTime;

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
        return $this->from('support@tradingview.sigiandco.com', 'SIGI&CO: Margin call Warning')
            ->view('emails.balance.upcomingmargincall')->with([
                'first_name' => $this->user->userProfile->first_name,
                'last_name' => $this->user->userProfile->last_name,
            ]);
    }
}
