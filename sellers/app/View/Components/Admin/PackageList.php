<?php

namespace App\View\Components\Admin;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

use App\Services\IPackageService;

class PackageList extends Component
{
    protected IPackageService $packageService;

    /**
     * Create a new component instance.
     */
    public function __construct(IPackageService $packageService)
    {
        $this->packageService = $packageService;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $packages = $this->packageService->getAll();

        return view('components.admin.package-list',['packages' => $packages]);
    }
}
