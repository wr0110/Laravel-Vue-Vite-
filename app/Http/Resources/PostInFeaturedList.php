<?php

namespace App\Http\Resources;

use App\Http\Resources\Author as AuthorResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PostInFeaturedList extends JsonResource
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
            'title' => $this->title,
            'author' => new AuthorResource($this->author),
            'published_at_in_time_ago' => $this->published_at_in_time_ago,
        ];
    }
}
