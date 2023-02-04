<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SubjectResource extends JsonResource
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
            'id' => (string) $this->id,
            'attributes' => [
                'name' => (string) $this->name,
                'created_by' => (string) $this->createdBy->username,
                'updated_by' => (string) $this->updatedBy->username,
                'created' => (string) $this->formattedCreatedAt,
                'updated' => (string) $this->formattedUpdatedAt
            ]
        ];
    }
}
