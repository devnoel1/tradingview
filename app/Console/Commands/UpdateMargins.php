<?php

namespace App\Console\Commands;

use App\Mail\MarginCall;
use App\Models\Symbol;
use App\Models\Task;
use App\Models\Wallet;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Scheb\YahooFinanceApi\ApiClientFactory;

class UpdateMargins extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tradebase:update-margins';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update margin cost and generate margin calls if needed';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $wallets = Wallet::where('margin', true)->get();
        foreach($wallets as $wallet){
            if($wallet->margin_balance > 0) {
                $wallet_value = 0;
                foreach ($wallet->walletSymbols as $wallet_symbol) {
                    $wallet_symbol_price = $wallet_symbol->getSymbolPrice();
                    $total_symbol_value = $wallet_symbol->amount * $wallet_symbol_price;
                    $wallet_value += $total_symbol_value;
                }
                $maintance_margin_perc = $wallet->user->userProfile->level->maintenance_margin_perc;
                $maintance_magin = $wallet_value * $maintance_margin_perc;
                $this->info("maintance: $maintance_magin");

                $equality = $wallet_value - $wallet->margin_balance;
                $this->info("equality: $equality");
                if ($equality < $maintance_magin) {
                    $this->alert("MARGIN CALL");
                    Mail::to($wallet->user->email)->send(new MarginCall($wallet->user));
                    $task = Task::create([
                        'user_id' => $wallet->user_id,
                        'created_user_id' => $wallet->user->created_user_id,
                        'owner_user_id' => $wallet->user->created_user_id,
                        'due_date' => Carbon::now(),
                        'description' => "Margin Call on ".$wallet->name,
                        'status' => 'new',
                        'type' => 'task',
                    ]);
                    $task->save();
                }
            }
        }
        return 0;
    }
}
