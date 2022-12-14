<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class DocumentResource extends JsonResource
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
            'user_id' => $this->user_id,
            'file_name' => $this->file_name,
            'extension' => $this->extension,
            'type' => $this->type,
            'url' => asset(Storage::url($this->path)),
            'download_url' => route('file:download', ["id" => $this->id]),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
