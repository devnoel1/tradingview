<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Affiliate;
use Illuminate\Http\Request;
use App\Http\Requests\AffiliateRequest;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\AffiliateLeadCollection;
use App\Http\Resources\AffiliateUserCollection;
use App\Http\Resources\AffiliateDepositCollection;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AffiliateCreateLeadController extends BaseController
{

    public function saveAffiliateLead(AffiliateRequest $request)
    {
        $affliate_user = Auth::user();
        if ($affliate_user->type === 'affiliate') {
            $afi_lead = new Affiliate();
            $afi_lead->affiliate_user_id = $affliate_user->id;
            $afi_lead->group_id = $affliate_user->group_id;
            $afi_lead->first_name = $request->first_name;
            $afi_lead->last_name = $request->last_name;
            $afi_lead->email = $request->email;
            $afi_lead->country = $request->country;
            $afi_lead->ip_address = $request->ip_address;
            $afi_lead->phone = $request->phone;
            $afi_lead->external_id = $request->external_id;
            $afi_lead->comment = $request->comment;
            $afi_lead->save();
            return $this->sendSuccessResponse('Lead created successfully!');
        } else {
            return $this->sendError('Only affililiate role user send data!');
        }
    }
    public function getAffiliateLead()
    {
        try {
            $affiliateleads = new AffiliateLeadCollection(Affiliate::where('affiliate_user_id', Auth::user()->id)->where(
                'user_status',
                0
            )->get());
            return $this->sendResponse("Affiliate leads", $affiliateleads);
        } catch (\Exception $e) {
            return $this->sendError($e);
        }
    }
    public function getAffiliateUser()
    {
        try {
            $affiliateusers = new AffiliateUserCollection(User::where('affiliate_user_id', Auth::user()->id)->get());
            return $this->sendResponse("Affiliate users", $affiliateusers);
        } catch (\Exception $e) {
            return $this->sendError($e);
        }
    }
    public function getAffiliateDeposit()
    {
        try {
            $affiliatesuerdeposits = User::where('affiliate_user_id', Auth::user()->id)->with('deposituser:id,user_id,wallet_id,amount,action,approved,created_at,updated_at')->get();
            foreach ($affiliatesuerdeposits as $users) {
                if ($users->deposituser->count() > 0) {
                    $data[] = $users->deposituser;
                }
            }
            return $this->sendResponse("Affiliate user deposits", $data);
        } catch (\Exception $e) {
            return $this->sendError($e);
        }
    }
}
