<?php

namespace App\Providers;
use App\Models\User;
use App\Models\Statement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;




class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    { //Разрешение пользователю к ресурсам привязанным к нему
        Gate::define('show-statement', function (User $user, Statement $statement) {
            return $user->id === $statement->user_id;
        });
        Gate::define('update-statement',function (User $user, Statement $statement){
             return $user->id === $statement->user_id;
        });
        Gate::define('edit-statement',function (User $user, Statement $statement){
            return $user->id === $statement->user_id;
       });
       Gate::define('destroy-statement',function (User $user, Statement $statement){
        return $user->id === $statement->user_id;
        });
        //Разрешение доступа администратору ко всем ресурсам
        Gate::before(function ($user) {
            if ($user->role == 'Admin') {
                return true;
            }
        });
    }
}
