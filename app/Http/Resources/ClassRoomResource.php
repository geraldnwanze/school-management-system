<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClassRoomResource extends JsonResource
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
                'name' => $this->name,
                'createdBy' => $this->createdBy->username,
                'updatedBy' => $this->updatedBy->username,
                'created' => $this->formattedCreatedAt,
                'updated' => $this->formattedUpdatedAt,
                'status' => $this->active
            ]
        ];
    }
}
