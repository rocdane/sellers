<?php

namespace App\View\Components\Admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

use App\Services\IOrderService;

class OrderList extends Component
{
    protected IOrderService $orderService;

    /**
     * Create a new component instance.
     */
    public function __construct(IOrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $orders = $this->orderService->getAll();

        return view('components.admin.order-list',['orders' => $orders]);
    }
}
