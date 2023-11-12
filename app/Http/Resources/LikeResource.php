<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LikeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->likedUser->name,
            'email' => $this->likedUser->email,
            'phone' => $this->likedUser->phone,
            'display_image' => $this->likedUser?->getMedia('display_image')?->last()?->getUrl(),
            'liked_at' => $this->created_at,
        ];
    }
}
