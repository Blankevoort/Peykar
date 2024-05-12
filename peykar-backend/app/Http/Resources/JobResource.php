<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class JobResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'province' => $this->province,
            'street' => $this->street,
            'rights_min' => $this->rights_min,
            'rights_max' => $this->rights_max,
            'tags' => $this->tags,
            'like_count' => $this->likes->count(),
            'request_count' => $this->requests->count(),
            'liked' => $this->liked,
            'requested' => $this->requested,
        ];
    }
}
