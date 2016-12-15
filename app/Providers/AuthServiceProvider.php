<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
        Gate::define('index-genre', function ($user) {
          return $user->isAdmin == 1;
        });
        Gate::define('create-genre', function ($user) {
          return $user->isAdmin == true;
        });
        Gate::define('store-genre', function ($user) {
          return $user->isAdmin == true;
        });
        Gate::define('show-genre', function ($user) { // nada linkea a esto
          return $user->isAdmin == true;
        });
        Gate::define('edit-genre', function ($user) {
          return $user->isAdmin == true;
        });
        Gate::define('update-genre', function ($user) {
          return $user->isAdmin == true;
        });
        Gate::define('destroy-genre', function ($user) {
          return $user->isAdmin == true;
        });

        Gate::define('index-user', function ($user) {
          return $user->isAdmin == true;
        });
        // Gate::define('create-user', function ($user) { // solo personas NO LOGUEADAS deben poder hacer esto
        //   return $user->isAdmin == true;
        // });
        // Gate::define('store-user', function ($user) { // solo personas NO LOGUEADAS deben poder hacer esto
        //   return $user->isAdmin == true;
        // });
        Gate::define('show-user', function ($user, $id) { // el admin puede ver * y un user solo puede verse él
          return ($user->isAdmin == true || $user->id == $id);
        });
        Gate::define('edit-user', function ($user) {
          return $user->isAdmin == false;
        });
        Gate::define('update-user', function ($user) {
          return $user->isAdmin == false;
        });
        Gate::define('destroy-user', function ($user) { // solo el admin puede eliminar users
          return $user->isAdmin == true;
        });
        Gate::define('showUserOrders-user', function ($user, $id) {
          return ($user->isAdmin == true || $user->id == $id);
        });

        // Gate::define('getAddToCart-product', function ($user) { // ????? está bien o hay que sacarlo para que pueda el guest ?????
        //   return ($user->isAdmin == false);
        // });
        Gate::define('index-product', function ($user) { // ????? está bien ?????
          return ($user->isAdmin == true);
        });
        Gate::define('create-product', function ($user) {
          return $user->isAdmin == true;
        });
        Gate::define('store-product', function ($user) {
          return $user->isAdmin == true;
        });
        // Gate::define('show-product', function ($user) {
        //   return $user->isAdmin == false;
        // });
        Gate::define('edit-product', function ($user) {
          return $user->isAdmin == true;
        });
        Gate::define('update-product', function ($user) {
          return $user->isAdmin == true;
        });
        Gate::define('destroy-product', function ($user) {
          return $user->isAdmin == true;
        });

        Gate::define('index-order', function ($user) {
          return $user->isAdmin == true;
        });
        Gate::define('create-order', function ($user) {
          return $user->isAdmin == false;
        });
        Gate::define('store-order', function ($user) {
          return $user->isAdmin == false;
        });
        Gate::define('show-order', function ($user, $order) { // ¿Pero el user tedría que poder ver SUS orders?
          //return ($user->isAdmin == true || $user->id == $order->user_id);
          return true;
        });
        Gate::define('edit-order', function ($user) { // nada linkea a esto
          return $user->isAdmin == true;
        });
        Gate::define('update-order', function ($user) { // nada linkea a esto
          return $user->isAdmin == true;
        });
        Gate::define('destroy-order', function ($user) { // nada linkea a esto
          return $user->isAdmin == true;
        });

        Gate::define('index-query', function ($user) {
          return $user->isAdmin == true;
        });
        Gate::define('create-query', function ($user) {
          return $user->isAdmin == false;
        });
        Gate::define('store-query', function ($user) {
          return $user->isAdmin == false;
        });
        Gate::define('show-query', function ($user) { // ¿Pero el user tedría que poder ver SUS queries?
          return $user->isAdmin == true;
        });
        Gate::define('edit-query', function ($user) { // nada linkea a esto
          return false;
        });
        Gate::define('update-query', function ($user) { // nada linkea a esto
          return false;
        });
        Gate::define('destroy-query', function ($user) { // nada linkea a esto
          return $user->isAdmin == true;
        });
    }
}
