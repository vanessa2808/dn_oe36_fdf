<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\OrderDetail;
use App\Models\Order;
use App\Repositories\Eloquent\OrderDetailRepository;
use App\Repositories\Eloquent\ProductRepository;
use App\Repositories\Eloquent\OrderRepository;
use App\Repositories\Interfaces\OrderDetailRepositoryInterface;
use App\Repositories\Interfaces\ProductRepositoryInterface;
use App\Repositories\Interfaces\OrderRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\User;
use App\Repositories\Eloquent\CategoryRepository;
use App\Repositories\Interfaces\CategoryRepositoryInterface;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(OrderRepositoryInterface::class, OrderRepository::class);
        $this->app->bind(OrderDetailRepositoryInterface::class, OrderDetailRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::share('category_list', Category::all());
        View::share('product_list', Product::all());
        View::share('order_list', Order::all());
        View::share('orderDetail_list', OrderDetail::all());
    }

}
