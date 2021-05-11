<?php

namespace App\Http\Resources;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Resources\Json\JsonResource;

class PostCatResource extends JsonResource
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
            // 'Post' => PostResource::collection(Post::where('id', $this->post_id)->get()),
            // 'Kategoria' => CategoriesResource::collection(Category::where('id', $this->category_id)->get()),
        ];
    }
}
