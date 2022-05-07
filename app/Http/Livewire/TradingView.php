<?php

namespace App\Http\Livewire;

use App\Http\Controllers\ExchangeController;
use App\Models\UserSymbol;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class TradingView extends Component
{

    public $active_exchange;
    public $active_symbol;
    public $active_code;
    public $user;
    public $system_status;
    public $first_render;

    public $userSymbols;

    /**
     * Prepare the component.
     *
     * @return void
     */
    public function mount()
    {
        $this->user = Auth::user();

        $this->system_status = 'operational';
        $this->first_render = now();

        $userSymbol = UserSymbol::where('user_id', '=', $this->user->id)->where('active', '=', 1)->first();
        $this->userSymbols = $userSymbol;
        if($userSymbol !== null){
            $this->active_exchange = $userSymbol->symbol->exchange->code;
            if($userSymbol->symbol->type == 'crypto'){
                $this->active_symbol = $userSymbol->symbol->code . $userSymbol->symbol->currency;
            }else{
                $this->active_symbol = $userSymbol->symbol->code;
            }
            $this->active_code = $this->active_exchange . ":" . $this->active_symbol;
        }else{
            $this->active_code="NASDAQ:AAPL";
            $us = UserSymbol::create([
                'user_id' => $this->user->id,
                'symbol_id' => 1,
                'favorite' => false,
                'active' => true
            ]);
            $us->save();
            $this->userSymbols = $us;
        }
    }

    public function render()
    {
        $interval = now()->diff($this->first_render);
        if(intval($interval->format('%s')) > 5) {
            $this->system_status = 'operational';
        }
        return view('livewire.trading-view');
    }
}
