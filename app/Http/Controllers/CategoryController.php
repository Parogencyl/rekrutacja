<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCategoryRequest;
use App\Repository\PostManage\CategoryRepository;
use Illuminate\View\View;

class CategoryController extends Controller
{
    private CategoryRepository $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index():View
    {
        return view('category.store');
    }

    public function store(AddCategoryRequest $request)
    {
        $data = $request->validated();

        $this->categoryRepository->add($data);

        return redirect()->route('category.get.create')
        ->with(['success' => "Kategoria {$data['name']} została dodana"]);
    }
}
