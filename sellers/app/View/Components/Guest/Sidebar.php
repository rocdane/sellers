<?php

namespace App\View\Components\Guest;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Services\ICategoryService;
class Sidebar extends Component
{
    private ICategoryService $categoryService;

    /**
     * Create a new component instance.
     */
    public function __construct(ICategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $categories = $this->categoryService->getAll();

        return view('components.guest.sidebar',['categories'=>$categories]);
    }
}
