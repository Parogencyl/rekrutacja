<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddPostRequest;
use App\Http\Resources\PostCatResource;
use App\Http\Resources\PostResource;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostCat;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index():View
    {
        $categories = Category::select('id', 'name')->get();

        return view('post.store', ['categories' => $categories]);
    }

    public function store(AddPostRequest $request)
    {
        $data = $request->validated();

        $categoriesRequest = $data['categoriesArray'];
        $categories = explode(',', $categoriesRequest);

        Post::create([
            'text' => $data['text'],
        ]);

        $post = Post::where('text', $data['text'])->first();
        $post->category()->attach($categories);

        return redirect()->route('get.post.create')->with('success', 'Post został dodany');
    }

    public function show(int $postId):View
    {
        $post = Post::with('category')->find($postId);
        $categories = Category::select('id', 'name')->get();

        return view('post.update', ['post' => $post, 'categories' => $categories]);
    }

    public function update(AddPostRequest $request)
    {
        $data = $request->validated();
        $id = $request->input('postId');
        $categoriesRequest = $data['categoriesArray'];
        $categories = explode(',', $categoriesRequest);

        $post = Post::findOrFail($id);
        $post->text = $data['text'];
        $post->category()->detach();
        $post->category()->attach($categories);
        $post->save();

        return redirect()->route('get.post.update',['postId' => $id])->with('success', 'Post został zedytowany');
    }

    public function indexApi(int $categoryId = null)
    {
        if($categoryId){
            $posts = POST::with('category')->get();
        } else {
            $posts = POST::get();
        }

        // $data = PostCat::get(); 
        // return PostCatResource::collection($data);
        return PostResource::collection($posts);
    }

}
