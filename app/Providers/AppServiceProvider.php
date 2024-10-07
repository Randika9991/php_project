<?php

namespace App\Providers;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use App\Models\Job;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

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
    public function boot(): void
    {
        //demo
        Model::preventLazyLoading();
//        \Illuminate\Pagination\Paginator::useBootstrapFive();
        Gate::define('edit-job', function (User $user, Job $job) {
            return $job->employer->user->is($user);
        });

        //can edit
    }
}
