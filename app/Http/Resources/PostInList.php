<?php

namespace App\Http\Resources;

use App\Http\Resources\Author as AuthorResource;
use App\Http\Resources\Category as CategoryResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PostInList extends JsonResource
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
            'slug' => $this->slug,
            'title' => $this->title,
            'content' => $this->truncated_content,
            'author' => new AuthorResource($this->author),
            'category' => new CategoryResource($this->category),
            'published_at_in_time_ago' => $this->published_at_in_time_ago,
        ];
    }
}
