<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class TenantResource extends JsonResource
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
            //Here I set what I want to return of Tenant
            'logo' => $this->logo ? url("storage/{$this->logo}") : '',
            'name' =>$this->name,
            'uuid' => $this->uuid,
            'flag' => $this->url,
            'contact'=> $this->email,
            'date_created' => Carbon::parse($this->created_at)->format('d/m/Y'),
        ];
    }
}
