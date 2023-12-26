<?php

namespace App\View\Components\Guest;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

use App\Models\Order;

class Cart extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $items = session()->get('cart',[]);

        return view('components.guest.cart',['items'=>$items]);
    }
}
