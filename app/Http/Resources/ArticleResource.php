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
            'id' => $this->id,
            'title' => $this->title,
            'sub_title' => $this->sub_title,
            'content' => $this->content,
            'author' => $this->user->name,
            'user_id' => $this->user_id,
            'tags' => $this->tags,
            "comments" => $this->comments ? CommentResource::collection($this->comments) : [],
            'created_at' => $this->created_at->toFormattedDateString()
        ];
    }
}
