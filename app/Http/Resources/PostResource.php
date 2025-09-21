<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "p_id"=>$this->id,
            "p_title"=>$this->title,
            "p_content"=>$this->content,
            "p_user"=>$this->user->name
        ];
    }
}
