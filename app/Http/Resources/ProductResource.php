<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'title' => $this->title,
            'flag' => $this->flag,
            'identify' => $this->uuid,
            'description' =>$this->description,
            'picture' => $this->picture ? url("storage/{$this->picture}") : '',
            'price' => $this->price,
        ];
    }
}
