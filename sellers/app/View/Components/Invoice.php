<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

use App\Models\Order;
use App\Models\Seller;
use App\Api\Document;

class Invoice extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public Order $order, 
        public Seller $seller, 
        public Document $document
    ){}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.invoice');
    }
}
