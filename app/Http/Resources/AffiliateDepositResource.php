<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AffiliateDepositResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       return [
        'id' => $this->deposituser->user_id,
        // 'wallet_id' =>$this->deposituser->wallet_id ,
        // 'amount' => $this->deposituser->amount,
        // 'action' => $this->deposituser->action,
        // 'approved' => $this->deposituser->approved,
        // 'account_number' => $this->deposituser->account_number,
        // 'note' => $this->deposituser->note,
        // 'created_at' =>(string) $this->deposituser->created_at,
        // 'updated_at' => (string) $this->deposituser->updated_at,

    ];
    }
}
