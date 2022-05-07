<?php

use GuzzleHttp\Client;
use Scheb\YahooFinanceApi\ApiClientFactory;
use App\Models\User;
use App\Models\Affiliate;
use Illuminate\Support\Facades\Auth;

// use Auth;

if (!function_exists('round_up')) {
    function round_up($value, $places = 0)
    {
        if ($places < 0) {
            $places = 0;
        }
        $mult = pow(10, $places);
        $result = ceil($value * $mult) / $mult;
        return number_format($result, $places, '.', '');
    }
}

if (!function_exists('getSymbolValueByQoute')) {
    function getSymbolValueByQoute($qoute)
    {
        $guzzleClient = new Client([]);
        $client = ApiClientFactory::createApiClient($guzzleClient);
        $marketPrice = $client->getQuote($qoute)->getRegularMarketPrice();
        $marketTime = $client->getQuote($qoute)->getRegularMarketTime();

        $changePercent = $client->getQuote($qoute)->getRegularMarketChangePercent();
        $marketVolume = $client->getQuote($qoute)->getRegularMarketVolume();
        $average10dayVolume = $client->getQuote($qoute)->getAverageDailyVolume10Day();
        return [
            "price" => $marketPrice,
            "marketTime" => $marketTime,
            "changePercent" => $changePercent,
            "marketVolume" => $marketVolume,
            "average10dayVolume" => $average10dayVolume,
        ];
    }
}

function leads()
{
    return Affiliate::where('user_id', Auth::user()->id)->count();
}

function users()
{
    return User::where('affiliate_user_id', Auth::user()->id)->count();
}

function deposits()
{
    $deposit = 0;
    $deposits = User::where('affiliate_user_id', Auth::user()->id)->with('deposituser')->latest()->get();
    foreach ($deposits as $users) {
        foreach ($users->deposituser as $user) {
            $deposit += $user->amount;
        }
    }
    return $deposit;

}

function conversionrate()
{
    $leads = Affiliate::where('user_id', Auth::user()->id)->count();
    $users = User::where('affiliate_user_id', Auth::user()->id)->count();
    if($leads == 0){
        return(number_format(0,1));
    }
    return number_format($users / $leads * 100, 1);
}


