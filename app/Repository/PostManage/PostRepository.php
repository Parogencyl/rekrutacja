<?php 

declare(strict_types=1);

namespace App\Repository\PostManage;

use App\Models\Post;
use App\Repository\PostRepository as PostRepositoryInterface;

class PostRepository implements PostRepositoryInterface
{
    private Post $postModel;

    public function __construct(Post $postModel)
    {
        $this->postModel = $postModel;
    }

    public function all()
    {
        return $this->postModel->with('category')->get();
    }

    public function get(int $postId)
    {
        // $element = $this->postModel->with('category')->find($postId);
        // dd($element);
        
        return $this->postModel->with('category')->find($postId);
    }

    public function add(array $data)
    {
        $this->postModel->create([
            'text' => $data['text'],
        ]);

        $data['categoriesArray'] = explode(',', $data['categoriesArray']);
        $newPost = $this->postModel->where('text', $data['text'])->first();
        $newPost->category()->attach($data['categoriesArray']);
    }

    public function update(array $data)
    {
        $post = $this->postModel->find($data['postId']);
        $post->text = $data['text'];
        $post->save();

        $data['categoriesArray'] = explode(',', $data['categoriesArray']);
        $post->category()->sync($data['categoriesArray']);
    }

    public function postApi(int $categoryId = null)
    {
        if($categoryId){
            $data = $this->postModel->with('category')->find($categoryId);
        }else {
            $data = $this->postModel->with('category')->get();
        }

        return $data;
    }
}