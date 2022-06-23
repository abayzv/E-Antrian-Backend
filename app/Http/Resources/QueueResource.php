<?php

namespace App\Http\Resources;

use App\Models\Customer;
use App\Models\Service;
use Illuminate\Http\Resources\Json\JsonResource;

class QueueResource extends JsonResource
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
            'customer' => Customer::where('customer_id', $this->id)->first()->pluck('name'),
            'service_type' => Service::where('service_id', $this->id)->first()->pluck('name')
        ];
    }
}
