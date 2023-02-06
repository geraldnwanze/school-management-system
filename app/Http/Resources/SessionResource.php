<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SessionResource extends JsonResource
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
            'id' => $this->id,
            'attributes' => [
                'from' => $this->from,
                'to' => $this->to,
                'status' => $this->active,
                'createdBy' => $this->createdBy->username,
                'updatedBy' => $this->updatedBy->username,
                'created' => $this->formattedCreatedAt,
                'updated' => $this->formattedUpdatedAt
            ]
        ];
    }
}
