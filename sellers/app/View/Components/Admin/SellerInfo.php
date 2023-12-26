<?php

namespace App\View\Components\Admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

use App\Services\ISellerService;
use App\Models\Seller;

class SellerInfo extends Component
{
    public ISellerService $sellerService;

    /**
     * Create a new component instance.
     */
    public function __construct(ISellerService $sellerService)
    {
        $this->sellerService = $sellerService;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $seller = $this->sellerService->getById(1);
        
        return view('components.admin.seller-info',['seller' => $seller]);
    }
}
