<?php

namespace App\Http\Resources;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'text' => $this->text,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
            'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
            'category' => CategoriesResource::collection($this->category),
        ];
    }
}
