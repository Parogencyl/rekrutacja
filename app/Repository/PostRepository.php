<?php

declare(strict_types=1);

namespace App\Repository;

interface PostRepository 
{
    public function all();
    public function get(int $postId);
    public function add(array $data);
    public function update(array $data);
    public function postApi(int $categoryId = null);
}