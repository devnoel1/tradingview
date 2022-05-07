<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AffiliateLeadResource extends JsonResource
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
        'id' => $this->id,
        'first_name' => $this->first_name,
        'last_name' => $this->last_name,
        'email' => $this->email,
        'country' => $this->country,
        'ip_address' => $this->ip_address,
        'phone' => $this->phone,
        'external_id' => $this->external_id,
        'created_at' => (string) $this->created_at,
        'updated_at' => (string) $this->updated_at,
    ];
    }
}
