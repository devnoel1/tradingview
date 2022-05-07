<?php

namespace App\Http\Livewire;

use App\Mail\MarginAccount;
use App\Mail\NewAccount;
use App\Mail\WithdrawelNotification;
use App\Models\BalanceTransaction;
use App\Models\Wallet;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use LVR\CreditCard\CardCvc;
use LVR\CreditCard\CardNumber;
// use LVR\CreditCard\CardExpirationYear;
// use LVR\CreditCard\CardExpirationMonth;
use LVR\CreditCard\CardExpirationDate;

class WalletView extends Component
{
    public $user;
    public $wallets;
    public $active_wallet_id;
    public $wallets_array = [];

    public $view_wallet;
    public $view_wallet_id;
    public $view_tab = 'trading_volumes';
    public $view_wallet_can_withdraw = false;
    public $total_value = 0;
    public $wallet_total_trading_volume = 0;
    public $wallet_total_deposits = 0;
    public $wallet_total_withdrawals = 0;

    public $addingWallet = false;
    public $new_name;
    public $margin_wallet = 0;

    public $renamingWallet = false;
    public $rename_name;

    public $depositingWallet = false;
    public $deposit_amount;
    public $deposit_note;

    public $withdrawingWallet = false;
    public $withdraw_amount = 0;
    public $withdraw_note;
    public $withdraw_error = false;

    public $transferingWallet = false;
    public $transfer_amount = 0;
    public $transfer_to_wallet_id = 0;
    public $transfer_error_amount = false;
    public $transfer_error_wallet = false;

    public $system_status;
    public $open_trading_volume;

    public $card_number = '';
    public $expiration_date = '';
    public $cvc = '';
    public $card_name ='';
    public $lname;
    public $currency = 0;
    public $currency_error = false;

    public $successPopup = false;
    public $successMessage = '';

    protected $listeners = [
        'makesuccessfalse'
    ];
    // protected function rules()
    // {
    //     return [
    //         'card_number' => ['required', new CardNumber],
    //         'cvc' => ['required', new CardCvc($this->card_number)],
    //     ];
    // }


    public function mount()
    {
        $this->user = Auth::user();

        $this->system_status = 'operational';
        $this->wallets = Wallet::where('user_id', '=', $this->user->id)->get();
        $this->updateFields();
    }

    public function setActive($wallet_id){
        $this->active_wallet_id = $wallet_id;
        foreach($this->wallets as $wallet){
            if($wallet->id == $wallet_id){
                $wallet->active = true;
            }else{
                $wallet->active = false;
            }
            $wallet->save();
        }
    }

    public function addWallet()
    {
        $wallet = Wallet::create([
            'user_id' => $this->user->id,
            'name' => $this->new_name,
            'currency' => "EUR",
            'balance' => 0,
            'margin' => $this->margin_wallet
        ]);
        $this->wallets = Wallet::where('user_id', '=', $this->user->id)->get();
        $this->updateFields();
        if($this->margin_wallet){
            Mail::to($this->user->email)->send(new MarginAccount($this->user));
        }else{
            Mail::to($this->user->email)->send(new NewAccount($this->user));
        }
        $this->addingWallet = false;
    }

    public function renameWallet(){
        $this->view_wallet->name = $this->rename_name;
        $this->view_wallet->save();
        $this->renamingWallet = false;
    }

    public function successPopupClose(){

        $this->depositingWallet = false;

        $this->emit('successPopupClosed');
    }
    public function successWPopupClose(){

        $this->withdrawingWallet = false;

        $this->emit('successPopupClosed');
    }
    public function successTPopupClose(){

        $this->transferingWallet = false;

        $this->emit('successPopupClosed');
    }

    public function makesuccessfalse(){
        $this->successPopup = false;
    }

    public function depositWallet()
    {
        if($this->currency == 0){
            $this->currency_error = true;
        }

        $this->validate(
            [
                'deposit_amount' => 'required|numeric|min:1',
                'card_number' => ['required', new CardNumber],
                'expiration_date' => ['required', new CardExpirationDate('m-y')],
                'cvc' => ['required', new CardCvc($this->card_number)],
                'card_name' => 'required',
            ],
            [
                'card_name.required' => 'Please enter your name on the card'
            ]
        );



        // if($this->withdraw_amount > 0)
        // {
            if($this->currency > 0){

                $transation = BalanceTransaction::create(
                    [
                        'user_id' => $this->user->id,
                        'wallet_id' => $this->view_wallet_id,
                        'amount' => $this->deposit_amount,
                        'note' => $this->deposit_note,
                        'action' => 'add'
                    ]
                );

                $transation->save();

                // $this->depositingWallet = false;

                $this->card_number = '';
                $this->expiration_date = '';
                $this->cvc = '';
                $this->card_name ='';
                $this->deposit_amount='';
                $this->deposit_note='';
                $this->currency = 0;
                $this->currency_error = false;

                $this->successPopup = true;

                session()->flash('DepositMessage', 'Deposit Pending.');

            }
            else{
                $this->currency_error = true;
            }
        // }

    }

    public function withdrawWallet(){
        if($this->view_wallet->balance >= $this->withdraw_amount and $this->withdraw_amount > 0){
            $this->withdraw_error = false;
            $transation = BalanceTransaction::create([
                'user_id' => $this->user->id,
                'wallet_id' => $this->view_wallet_id,
                'amount' => $this->withdraw_amount,
                'note' => $this->withdraw_note,
                'action' => 'payout'
            ]);
            $transation->save();
            // $this->withdrawingWallet = false;
            $this->successPopup = true;

            $this->withdraw_amount = 0;
            $this->withdraw_note='';

            Mail::to($this->user->email)->send(new WithdrawelNotification($this->user, $this->withdraw_amount));
            session()->flash('WithdrawMessage', 'Withdraw Pending.');
        }else{
            $this->withdraw_error = true;
        }
    }

    public function transferWallet(){
        $this->transfer_error_amount = false;
        $this->transfer_error_wallet = false;
        if($this->view_wallet->balance >= $this->transfer_amount and $this->transfer_amount > 0){
            if($this->transfer_to_wallet_id  > 0) {
                $transation = BalanceTransaction::create([
                    'user_id' => $this->user->id,
                    'wallet_id' => $this->view_wallet_id,
                    'amount' => $this->transfer_amount,
                    'note' => "transfer to other wallet",
                    'action' => 'payout',
                    'approved' => true,
                ]);
                $transation->save();
                $transation = BalanceTransaction::create([
                    'user_id' => $this->user->id,
                    'wallet_id' => $this->transfer_to_wallet_id,
                    'amount' => $this->transfer_amount,
                    'note' => "transfer from other wallet",
                    'action' => 'add',
                    'approved' => true,
                ]);
                $transation->save();
                $this->view_wallet->balance -= $this->transfer_amount;
                $this->view_wallet->save();
                foreach($this->wallets as $wallet){
                    if($wallet->id == $this->transfer_to_wallet_id){
                        $wallet->balance += $this->transfer_amount;
                        $wallet->save();
                    }
                }
                // $this->transferingWallet = false;
                $this->transfer_amount = 0;
                $this->transfer_to_wallet_id = 0;

                $this->successPopup=true;
                session()->flash('TransferMessage', 'Transfer Pending.');
            }else{
                $this->transfer_error_wallet = true;
            }
        }else{
            $this->transfer_error_amount = true;
        }
    }

    public function setTotalWallet($wallet_id){
    $this->wallet_total_trading_volume = 0;
    $this->wallet_total_deposits = 0;
    $this->wallet_total_withdrawals = 0;
    foreach ($this->wallets as $wallet) {
        if($wallet->id == $wallet_id) {
            $tv_required = 0;
            $tv_paid = 0;
            foreach($wallet->tradingVolumes as $tradingVolume){
                $tv_required += $tradingVolume->required_volume;
                $tv_paid += $tradingVolume->approved_volume;
            }
            $this->wallet_total_trading_volume += ($tv_required - $tv_paid);
            foreach($wallet->balanceTransactions as $balance_transaction){
                if($balance_transaction->approved == 1){
                    if($balance_transaction->action == 'add'){
                        $this->wallet_total_deposits += $balance_transaction->amount;
                    }elseif($balance_transaction->action == 'payout'){
                        $this->wallet_total_withdrawals += $balance_transaction->amount;
                    }
                }
            }
        }
    }
}

    public function setView($wallet_id){
        $this->view_wallet_id = $wallet_id;
        $this->setTotalWallet($wallet_id);
        $this->view_tab = 'trading_volumes';
        foreach ($this->wallets as $wallet) {
            if($wallet->id == $wallet_id){
                $this->rename_name = $wallet->name;
                $this->view_wallet = $wallet;
                $this->setCanWithdraw();
            }
        }
    }

    public function setViewTab($tab){
        $this->view_tab = $tab;
    }

    public function render()
    {
        $this->system_status = 'operational';
        $this->wallets = Wallet::where('user_id', '=', $this->user->id)->get();
        $this->setTotalWallet($this->view_wallet_id);
        return view('livewire.wallet-view');
    }

    private function updateFields(): void
    {
        $this->total_value = 0;
        $this->wallets_array = [];
        foreach ($this->wallets as $wallet) {
            $this->total_value += $wallet->balance;
            $wallet_value = $wallet->balance;
            if($wallet->active){
                $this->view_wallet_id = $wallet->id;
                $this->view_wallet = $wallet;
                $this->setCanWithdraw();
                $this->rename_name = $wallet->name;
                $this->active_wallet_id = $wallet->id;
            }
            $wallet_symbols_array = [];
            foreach($wallet->walletSymbols as $walletSymbol){
                $symbol = $walletSymbol->symbol;
                $symbol_price = round_up($walletSymbol->getSymbolPrice(), 2);
                $symbol_total = round_up(($symbol_price * $walletSymbol->amount), 2);
                $this->total_value += $symbol_total;
                $wallet_value += $symbol_total;
                $symbol_object = [
                    'id' => $symbol->id,
                    'name' => $symbol->name,
                    'description' => $symbol->description,
                    'code' => $symbol->code,
                    'amount' => $walletSymbol->amount,
                    'price' => $symbol_price,
                    'total' => $symbol_total,
                ];
                $wallet_symbols_array[] = $symbol_object;
            }
            $wallet_total_values = $wallet->getTotalOrderValues();
            $this->wallets_array[] = [
                'name' => $wallet->name,
                'id' => $wallet->id,
                'symbols' => $wallet_symbols_array,
                'total_value' => $wallet_total_values['total_value'],
                'total_buy_value' => $wallet_total_values['total_buy_value'],
                'total_sell_value' => $wallet_total_values['total_sell_value'],
                'total_pl' => $wallet_total_values['total_pl'],
            ];
        }
    }

    private function setCanWithdraw(): void
    {
        $this->view_wallet_can_withdraw = false;
        if ($this->view_wallet->balance > 0) {
            $open_trading_volume = 0;
            foreach ($this->view_wallet->tradingVolumes as $tradingVolume) {
                $open_trading_volume += $tradingVolume->required_volume;
                $open_trading_volume -= $tradingVolume->approved_volume;
            }
            $this->open_trading_volume = $open_trading_volume;
            if($open_trading_volume <= 0) {
                $this->view_wallet_can_withdraw = true;
            }
        }
    }
}
