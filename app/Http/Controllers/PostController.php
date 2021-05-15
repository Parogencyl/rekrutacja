<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddPostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\PostResource;
use App\Repository\PostManage\CategoryRepository;
use App\Repository\PostManage\PostRepository;
use Illuminate\View\View;

class PostController extends Controller
{
    private PostRepository $postRepository;
    private CategoryRepository $categoryRepository;

    public function __construct(PostRepository $postRepository, CategoryRepository $categoryRepository)
    {
        $this->postRepository = $postRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function index():View
    {
        $categories = $this->categoryRepository->all();
        
        return view('post.store', ['categories' => $categories]);
    }

    public function store(AddPostRequest $request)
    {
        $data = $request->validated();
        $this->postRepository->add($data);
        
        return redirect()->route('post.get.create')->with('success', 'Post został dodany');
    }

    public function show(int $postId):View
    {
        $post = $this->postRepository->get($postId);
        $categories = $this->categoryRepository->all();

        return view('post.update', ['post' => $post, 'categories' => $categories]);
    }

    public function update(UpdatePostRequest $request)
    {
        $data = $request->validated();
        $this->postRepository->update($data);
        
        return redirect()->route('post.get.update',['postId' => $data['postId']])->with('success', 'Post został zedytowany');
    }

    public function indexApi(int $categoryId = null)
    {
        $data = $this->postRepository->postApi($categoryId);

        if($categoryId){
            return new PostResource($data);
        } else {
            return PostResource::collection($data);
        }
    }

}
