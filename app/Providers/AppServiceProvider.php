<?php

namespace App\Providers;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        Paginator::useBootstrap();

        Gate::define('edit',function(User $user,Comment $comment){
            return $user->id == $comment->user_id;
         });

         Gate::define('delete',function(User $user,Comment $comment){
            return $user->id == $comment->user_id;
         });
    }
}
