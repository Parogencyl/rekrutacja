<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddPostRequest;
use App\Models\Category;
use App\Models\Post;
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

        Post::create([
            'text' => $data['text'],
            'category_id' => (int) $data['category'],
        ]);

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

        $post = Post::findOrFail($id);
        $post->text = $data['text'];
        $post->category_id = $data['category'];
        $post->save();

        return redirect()->route('get.post.update',['postId' => $id])->with('success', 'Post został zedytowany');
    }

    public function indexApi(int $categoryId = null)
    {
        if($categoryId){
            $posts = POST::with('category')->where('category_id', $categoryId)->get();
        } else {
            $posts = POST::with('category')->get();
        }

        return $posts->toJson();
    }
}
