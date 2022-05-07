<?php

namespace App\Http\Livewire;

use App\Models\Symbol;
use App\Models\UserSymbol;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SymbolSearch extends Component
{
    public $searchTerm = "";
    public $testingError;
    public $symbols;
    public $userSymbols;
    public $user;
    public $show = false;
    public $selectedType = "fav";
    public $currentViewSymbol;
    public $activeSymbols;
    public $counter = 0;

    public function showType($type){
        $this->selectedType = $type;
    }

    public function addSymbolToFavorites($symbol_id)
    {

        if(!in_array($symbol_id, $this->activeSymbols)) {
            $userSymbol = UserSymbol::create([
                'user_id' => $this->user->id,
                'symbol_id' => $symbol_id,
                'favorite' => true,
            ]);
            $userSymbol->save();
            array_push($this->activeSymbols, $symbol_id);
        }else{
            $userSymbol = UserSymbol::where('user_id', '=', $this->user->id)->where('symbol_id', '=', $symbol_id)->first();
            $userSymbol->favorite = true;
            $userSymbol->save();
        }
    }

    public function removeSymbolFromFavorites($symbol_id)
    {
        $userSymbol = UserSymbol::where('user_id', '=', $this->user->id)->where('symbol_id', '=', $symbol_id)->first();
        if($userSymbol->active){
            $userSymbol->favorite = false;
            $userSymbol->save();
        }else{
            $userSymbol->delete();
            if (($key = array_search($symbol_id, $this->activeSymbols)) !== false) {
                unset($this->activeSymbols[$key]);
            }
        }
    }

    public function addActiveSymbol($symbol_id)
    {
        $symbols = UserSymbol::where('user_id', '=', $this->user->id)->where('active', '=', 1)->get();
        foreach($symbols as $symbol){
            if($symbol->favorite){
                $symbol->active = false;
                $symbol->save();
            }else{
                if (($key = array_search($symbol->symbol_id, $this->activeSymbols)) !== false) {
                    unset($this->activeSymbols[$key]);
                }
                $symbol->delete();
            }
        }

        if(!in_array($symbol_id, $this->activeSymbols)) {
            $us = UserSymbol::create([
                'user_id' => $this->user->id,
                'symbol_id' => $symbol_id,
                'favorite' => false,
                'active' => true
            ]);
            $us->save();
            array_push($this->activeSymbols, $symbol_id);
        }else{
            $userSymbol = UserSymbol::where('user_id', '=', $this->user->id)->where('symbol_id', '=', $symbol_id)->first();
            $userSymbol->active = true;
            $userSymbol->save();
        }
        return redirect()->to(route('trade'));
    }

    public function toggleSearch(){
        if($this->show){
            $this->show = false;
        }else{
            $this->show = true;
        }
    }

    public function mount()
    {
        $this->user = Auth::user();
        $this->currentViewSymbol = UserSymbol::where('user_id', '=', $this->user->id)->where('active', '=', 1)->first();
        if($this->currentViewSymbol == null){
            $us = UserSymbol::create([
                'user_id' => $this->user->id,
                'symbol_id' => 1,
                'favorite' => false,
                'active' => true
            ]);
            $this->currentViewSymbol = $us;
        }
    }

    public function updated(){
    }

    public function render()
    {
        $this->userSymbols = UserSymbol::where('user_id', '=', $this->user->id)->get();
        $this->activeSymbols = [];
        foreach($this->userSymbols as $symbol){
            array_push($this->activeSymbols, $symbol->symbol_id);
        }
        $searchTerm = "%".$this->searchTerm."%";

        $this->symbols = Symbol::where('description', 'like', $searchTerm)->whereNotIn('id', $this->activeSymbols)->orderBy('description')->get();

        if($this->selectedType == 'fav'){
            $this->symbols = Symbol::where('description', 'like', $searchTerm)->whereIn('id', $this->activeSymbols)->orderBy('description')->get();
        }elseif($this->selectedType == 'all'){
            $this->symbols = Symbol::where('description', 'like', $searchTerm)->orderBy('description')->get();
        }elseif($this->selectedType == 'sto'){
            $this->symbols = Symbol::where('type', '=', 'stock')->where('description', 'like', $searchTerm)->orderBy('description')->get();
        }elseif($this->selectedType == 'com'){
            $this->symbols = Symbol::where('type', '=', 'commodities')->where('description', 'like', $searchTerm)->orderBy('description')->get();
        }elseif($this->selectedType == 'ind'){
            $this->symbols = Symbol::where('type', '=', 'indices')->where('description', 'like', $searchTerm)->orderBy('description')->get();
        }elseif($this->selectedType == 'frx'){
            $this->symbols = Symbol::where('type', '=', 'forex')->where('description', 'like', $searchTerm)->orderBy('description')->get();
        }elseif($this->selectedType == 'cry'){
            $this->symbols = Symbol::where('type', '=', 'crypto')->where('description', 'like', $searchTerm)->orderBy('description')->get();
        }

        return view('livewire.symbol-search');
    }
}
