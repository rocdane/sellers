<?php

namespace App\View\Components\Admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

use App\Services\ICategoryService;
use App\Services\IOrderService;
use App\Services\IProductService;
use App\Services\IPackageService;
use App\Services\ISellerService;

use App\Models\Seller;

class Sidebar extends Component
{
    private ICategoryService $categoryService;
    private IProductService $productService;
    private IOrderService $orderService;
    private IPackageService $packageService;
    private ISellerService $sellerService;

    public array $dashboard;

    /**
     * Create a new component instance.
     */
    public function __construct(
        ICategoryService $categoryService,
        IProductService $productService,
        IOrderService $orderService,
        IPackageService $packageService,
        ISellerService $sellerService,
    ){
        $categories = $categoryService->getAll()->count();
        $products = $productService->getAll()->count();
        $orders = $orderService->getAll()->count();
        $packages = $packageService->getAll()->count();
        
        $this->sellerService = $sellerService;
        
        $this->dashboard = [
            'categories' => $categories,
            'products' => $products,
            'packages' => $packages,
            'orders' => $orders,
        ];        
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {

        $seller = $this->sellerService->getById(1);
        
        return view('components.admin.sidebar',['dashboard'=>$this->dashboard,'seller'=>$seller]);
    }
}
