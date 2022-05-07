<?php

namespace App\Mail;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MonthlyStatement extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $month;
    public $begin;
    public $deposit;
    public $withdrawals;
    public $movement;
    public $income;
    public $fees;
    public $openPositions;
    public $end;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, $begin=0, $deposit=0, $withdrawals=0, $movement=0, $income=0, $fees=0, $openPositions=0, $end=0)
    {
        $this->user = $user;
        $this->month = Carbon::now()->format('F Y');
        $this->begin = $begin;
        $this->deposit = $deposit;
        $this->withdrawals = $withdrawals;
        $this->movement = $movement;
        $this->income = $income;
        $this->fees = $fees;
        $this->openPositions = $openPositions;
        $this->end = $end;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('support@tradingview.sigiandco.com', 'SIGI&CO: Monthly Statement')
            ->view('emails.balance.monthlystatement')->with([
                'username' => $this->user->email,
                'month' => $this->month,
                'account_manager' => $this->user->createdUser()->name,
                'begin' => $this->begin,
                'deposit' => $this->deposit,
                'withdrawals' => $this->withdrawals,
                'movement' => $this->movement,
                'income' => $this->income,
                'fees' => $this->fees,
                'open_positions' => $this->openPositions,
                'end' => $this->end,
            ]);
    }
}
