<?php

namespace App\Console\Commands;

use App\Models\Order;
use App\Models\Wallet;
use Carbon\Carbon;
use Illuminate\Console\Command;

class UpdateTradingVolumes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tradebase:update-trading-volumes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update all trading volumes';

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
        $today = Carbon::createFromFormat('d/m/Y H:i:s',  '18/01/2021 00:00:00');
        $yesterday = Carbon::createFromFormat('d/m/Y H:i:s',  '18/10/2021 00:00:00');
//        $orders = Order::whereBetween('updated_at', [$today->format('Y-m-d')." 00:00:00", $yesterday->format('Y-m-d')." 23:59:59"])
        $orders = Order::where('created_at', '>=', Carbon::today())
            ->whereIn('status', ['open', 'close', 'waiting_sell'])
            ->orderBy('wallet_id', 'DESC')
            ->orderBy('symbol_id', 'DESC')->get();
        $last_wallet_id = null;
        $wallet_trade_value = [];
        foreach($orders as $order){
            $order_type = $order->type;
            $order_status = $order->status;
            $wallet_id = $order->wallet_id;
            $symbol_id = $order->symbol_id;
            $buy_amount = $order->price;
            $sell_amount = $order->sell_price;
            echo("Type: $order_type, status $order_status, wallet_id: $wallet_id, symbol_id $symbol_id, buy amount: $buy_amount, sell amount: $sell_amount \r\n");
            if($last_wallet_id != null && $last_wallet_id != $wallet_id){
                $this->processWallet($last_wallet_id, $wallet_trade_value);
                $last_wallet_id = $wallet_id;
            }elseif($last_wallet_id == null){
                $last_wallet_id = $wallet_id;
            }
            if(!array_key_exists($symbol_id, $wallet_trade_value)){
                $wallet_trade_value[$symbol_id] = 0;
            }
            if($order->created_at == $order->updated_at){
                // Process order current add everything in the order to tradingvolume
                if($buy_amount != null){
                    $wallet_trade_value[$symbol_id] += $buy_amount;
                }
                if($sell_amount!=null){
                    $wallet_trade_value[$symbol_id] += $sell_amount;
                }
            }else{
                // process updated orders
                if($order->created_at->diffInDays($order->updated_at)>=1){
                    //if date diff > 1 day. Add sell to amount, otherwise buy (due to waiting)
                    if($sell_amount!=null){
                        $wallet_trade_value[$symbol_id] += $sell_amount;
                    }elseif($buy_amount != null){
                        $wallet_trade_value[$symbol_id] += $buy_amount;
                    }
                }else{
                    // if date diff < 1 only add buy and remove sell;
                    if($buy_amount != null){
                        $wallet_trade_value[$symbol_id] += $buy_amount;
                    }
                    if($sell_amount!=null){
                        $wallet_trade_value[$symbol_id] -= $sell_amount;
                    }
                }
            }
        }
        if($last_wallet_id != null) {
            $this->processWallet($last_wallet_id, $wallet_trade_value);
        }
        return 0;
    }

    private function processWallet($wallet_id, $wallet_trade_value){
        $wallet = Wallet::find($wallet_id);
        foreach($wallet->tradingVolumes as $tradingVolume){
            if($tradingVolume->status == 'open'){
                foreach($wallet_trade_value as $amount){
                    $tradingVolume->approved_volume += abs($amount);
                }
                $tradingVolume->pending_volume = 0.00;
                $tradingVolume->save();
            }
        }

    }
}
