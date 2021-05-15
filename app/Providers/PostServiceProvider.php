<?php

namespace App\Providers;

use App\Repository\PostManage\PostRepository as PostManagePostRepository;
use App\Repository\PostRepository;
use Illuminate\Support\ServiceProvider;

class PostServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PostRepository::class, PostManagePostRepository::class);
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
