<?php

namespace App\Providers;

use App\Services\ICategoryService;
use App\Services\CategoryService;
use App\Services\IProductService;
use App\Services\ProductService;
use App\Services\IPackageService;
use App\Services\PackageService;
use App\Services\IOrderService;
use App\Services\OrderService;
use App\Services\ICustomerService;
use App\Services\CustomerService;
use App\Services\ISellerService;
use App\Services\SellerService;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(ICategoryService::class, CategoryService::class);
        $this->app->bind(IProductService::class, ProductService::class);
        $this->app->bind(IPackageService::class, PackageService::class);
        $this->app->bind(IOrderService::class, OrderService::class);
        $this->app->bind(ICustomerService::class, CustomerService::class);
        $this->app->bind(ISellerService::class, SellerService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
