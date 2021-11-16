<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'title' => $this->title,
            'content' => $this->content,
            'author' => $this->user->name,
            'tags' => TagResource::collection($this->tags()),
            'created_at' => $this->created_at->format('d/m/Y')
        ];
    }
}
