<?php

namespace App\Providers;

use App\Repository\CategoryRepository;
use App\Repository\PostManage\CategoryRepository as PostManageCategoryRepository;
use Illuminate\Support\ServiceProvider;

class CategoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CategoryRepository::class, PostManageCategoryRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
