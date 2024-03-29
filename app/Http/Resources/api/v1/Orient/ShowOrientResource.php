<?php

namespace App\Http\Resources\api\v1\Orient;

use Illuminate\Http\Resources\Json\JsonResource;

class ShowOrientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'district_id'=>$this->district_id,
        ];
    }
}
