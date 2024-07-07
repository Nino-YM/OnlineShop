<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\{Address, Category, Favorite, Order, Product, Promotion, Review, Role, User};
use App\Policies\{AddressPolicy, CategoryPolicy, FavoritePolicy, OrderPolicy, ProductPolicy, PromotionPolicy, ReviewPolicy, RolePolicy, UserPolicy};

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        Address::class => AddressPolicy::class,
        Category::class => CategoryPolicy::class,
        Favorite::class => FavoritePolicy::class,
        Order::class => OrderPolicy::class,
        Product::class => ProductPolicy::class,
        Promotion::class => PromotionPolicy::class,
        Review::class => ReviewPolicy::class,
        Role::class => RolePolicy::class,
        User::class => UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('manage-users', [UserPolicy::class, 'manage']);
        Gate::define('manage-roles', [RolePolicy::class, 'manage']);
        Gate::define('manage-products', [ProductPolicy::class, 'manage']);
        Gate::define('manage-categories', [CategoryPolicy::class, 'manage']);
        Gate::define('manage-promotions', [PromotionPolicy::class, 'manage']);
    }
}
