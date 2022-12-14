<?php

namespace App\Http\Resources;

use App\Models\Document;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable as JsonSerializableAlias;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     * @return array|Arrayable|JsonSerializableAlias
     */
    public function toArray($request): array|JsonSerializableAlias|Arrayable
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'last_name' => $this->last_name,
            'username' => $this->username,
            'picture' => new DocumentResource($this->whenLoaded('picture')),
            'resume' => new DocumentResource($this->whenLoaded('resume')),
            'email' => $this->email,
            'full_name' => $this->name . ' ' . $this->last_name,
            'role' => $this->role,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
