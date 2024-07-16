<?php

namespace App\Providers;


use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\User;
use App\Models\Article;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
        $this->registerPolicies();
        Gate::define('create-post',function(User $user){
            return $user->roles()->where('roles.role_id', 1)->exists();
        });
        Gate::define('edit-post',function(User $user, Article $article){
            if($user->roles()->where('roles.role_id', 4)->exists()){
                return true;
            }
            if($article->user_id === $user->user_id){
                return true;
            }
            return false;
        });
    }
}
