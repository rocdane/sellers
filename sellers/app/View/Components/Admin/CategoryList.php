<?php

namespace App\View\Components\Admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

use App\Services\ICategoryService;

class CategoryList extends Component
{
    protected ICategoryService $categoryService;

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

        return view('components.admin.category-list',['categories' => $categories]);
    }
}
