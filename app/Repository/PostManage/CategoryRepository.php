<?php 

declare(strict_types=1);

namespace App\Repository\PostManage;

use App\Models\Category;
use App\Repository\CategoryRepository as CategoryRepositoryInterface;

class CategoryRepository implements CategoryRepositoryInterface
{
    private Category $categoryModel;

    public function __construct(Category $categoryModel)
    {
        $this->categoryModel = $categoryModel;
    }

    public function all()
    {
        return $this->categoryModel->get();
    }

    public function add(array $data)
    {
        $this->categoryModel->create([
            'name' => $data['name'],
        ]);
    }
}