<?php

declare(strict_types=1);

namespace App\Repository;

interface CategoryRepository 
{
    public function all();
    public function add(array $data);
}