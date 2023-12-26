<?php

namespace App\View\Components\Guest;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

use App\Services\IProductService;
use App\Models\Product;
class ProductList extends Component
{
    protected IProductService $productService;

    /**
     * Create a new component instance.
     */
    public function __construct(IProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $products = $this->productService->getAvailable(5);

        return view('components.guest.product-list',['products' => $products]);
    }
}
