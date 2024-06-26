<?php

namespace App\Providers;

use App\Models\User;
use App\Repositories\Implementations\CommentRepository;
use App\Repositories\Interfaces\CommentRepositoryInterface;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {

        Gate::define('admin', fn(User $user) => $user->role == 'admin');
        

    }
}
