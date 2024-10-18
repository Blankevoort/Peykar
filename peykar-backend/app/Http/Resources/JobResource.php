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
            'like_count' => $this->likeCount,
            'request_count' => $this->requestCount,
            'tagsCount' => $this->tagsCount,
            'liked' => $this->liked,
            'requested' => $this->requested,
            'tagsList' => $this->tagsList,
        ];
    }
}
