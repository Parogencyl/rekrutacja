<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function index():View
    {
        return view('category.store');
    }

    public function store(AddCategoryRequest $request)
    {
        $data = $request->validated();

        Category::create([
            'name' => $data['name'],
        ]);

        return redirect()->route('get.category.create')
        ->with(['success' => "Kategoria {$data['name']} została dodana"]);
    }
}
