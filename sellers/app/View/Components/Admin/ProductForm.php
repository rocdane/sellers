<?php

namespace App\View\Components\Admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Collection;

use App\Models\Product;

class ProductForm extends Component
{
    public Product $product;
    public Collection $categories;

    /**
     * Create a new component instance.
     */
    public function __construct($product,$categories)
    {
        $this->product = $product;
        $this->categories = $categories->pluck('name','id');
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.admin.product-form');
    }
}
