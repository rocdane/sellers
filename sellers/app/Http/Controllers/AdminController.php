<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;
use App\Api\Document;
use App\Services\ISellerService;
use App\Services\ICategoryService;
use App\Services\IProductService;
use App\Services\IPackageService;
use App\Services\IOrderService;

use App\Models\Seller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Package;
use App\Models\Order;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ProductFormRequest;
use App\Http\Requests\Api\PackageFormRequest;
use App\Http\Requests\Api\CategoryFormRequest;
use App\Http\Requests\Api\OrderFormRequest;
use App\Http\Requests\Api\SellerFormRequest;
use App\Http\Requests\Api\BankFormRequest;

use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminController extends Controller
{
    private ISellerService $sellerService;
    private ICategoryService $categoryService;
    private IProductService $productService;
    private IPackageService $packageService;
    private IOrderService $orderService;

    public function __construct(
        ISellerService $sellerService,
        ICategoryService $categoryService,
        IProductService $productService, 
        IPackageService $packageService,
        IOrderService $orderService,
    ) {
        $this->sellerService = $sellerService;
        $this->categoryService = $categoryService;
        $this->productService = $productService;
        $this->packageService = $packageService;
        $this->orderService = $orderService;
    }
    
    public function index(): View
    {
        $products = $this->productService->getAll();
        return view('admin.dashboard',['products' => $products]);
    }

    public function edit(Seller $seller): View
    {
        $seller = $this->sellerService->getById(1);
        return view('admin.profile',['seller' => $seller]);
    }

    public function apply(SellerFormRequest $request)
    {
        $data = $request->validated();
     
        /** @var UploadedFile|null $file */
        $file = $request->validated('picture');

        if($file != null && !$file->getError()){
            $picture = $file->store('seller','public');
            $data['picture'] = $picture;
        }

        $seller->exists? $this->sellerService->update($seller->id, $data) : $seller = $this->sellerService->create($data);
        
        return to_route('admin.index')->with('success', 'Profile updated successfully');
    }

    public function save(BankFormRequest $request)
    {
        $data = $request->validated();
        $seller = $this->sellerService->getById(1);
        if($seller != null){
            $this->sellerService->editBank($seller->id, $data);
        }else{
            return to_route('admin.index');    
        }
        return to_route('admin.index')->with('success', 'Bank saved successfully');
    }

    public function category(): View
    {
        $categories = $this->categoryService->getAll();
        return view('admin.category',['categories' => $categories]);
    }
 
    public function create(Category $category): View
    {
        return view('admin.create-category',['category' => $category]);
    }

    public function set(CategoryFormRequest $request)
    {
        $category = $this->categoryService->create($request->validated());

        return to_route('admin.category')->with('success','Category registrated successfully');
    }

    public function delete(Category $category)
    {
        $category->delete();
        return to_route('admin.category')->with('success','Category archived successfully');
    }

    public function product(): View
    {
        $products = $this->productService->getAll();

        return view('admin.product',['products' => $products]);
    }

    public function ads(): View
    {
        $product = new Product();
        
        
        $categories = $this->categoryService->getAll();

        return view('admin.add-product',[
            'product' => $product,
            'categories' => $categories,
        ]);
    }

    public function add(ProductFormRequest $request)
    {
        $data = $request->validated();

        /** @var UploadedFile|null $media */
        $file = $request->validated('media');

        if($file != null && !$file->getError()){
            $media = $file->store('product','public');
            $data['media'] = $media;
        }
        
        $files = $request->file('pictures');

        $pictures = [];

        if($files != null){
            foreach( $files as $file){
                $name = $file->store('product','public');
                $pictures[]['name'] = $name;
            }
        }

        $product = $this->productService->create($data);

        $category = $this->categoryService->getById($request->validated('category'));
        $product->category()->associate($category);

        $product->save();
        
        $product->pictures()->createManyQuietly($pictures);
        
        return to_route('admin.product')->with('success','Product registrated successfully');
    }

    public function archive(Product $product)
    {
        Storage::disk('public')->delete($product->media);
        
        foreach( $product->pictures as $picture){
            Storage::disk('public')->delete($picture->name);
        }

        $product->delete();
        
        return to_route('admin.product')->with('success','Product archived successfully');
    }

    public function order(): View
    {
        $orders = $this->orderService->getAll();
        return view('admin.order',$orders);
    }

    public function view(string $id): View
    {
        $order = $this->orderService->getById($id);
        $seller = $this->sellerService->getById(1);
        $document = new Document('Order Confirmation','Payment before delivery.','Bank Transfer');
        return view('report.invoice',['order'=>$order,'seller'=>$seller,'document'=>$document]);
    }

    public function confirm(string $id)
    {
        $order = $this->orderService->getById($id);
        $order->update(['confirmed' => true, 'confirmed_at' => Carbon::now()]);
        $seller = $this->sellerService->getById(1);
        $document = new Document('Order Confirmation','Payment before delivery.','Bank Transfer');
        // send order confirmed notification to customer
        return view('report.invoice',['order'=>$order,'seller'=>$seller,'document'=>$document]);
    }

    public function cancel(string $id)
    {
        $order = $this->orderService->getById($id);
        // send order canceled notification to customer
        $order->delete();
        return to_route('admin.order')->with('success','Order canceled successfully');
    }

    public function package(): View
    {
        $packages = $this->packageService->getAll();

        return view('admin.package',['packages' => $packages]);
    }

    public function wrap(Package $package): View
    {
        // wrapper notification)
        return view('admin.wrap',['package' => $package]);
    }

    public function ship(PackageFormRequest $request)
    {
        $package = $this->packageService->create($request->validated());
        // shipping notification
        return to_route('admin.package')->with('success','Package registrated successfully');
    }

    public function destroy(Package $package): View
    {
        $package->delete();
        // destroy package
        return to_route('admin.package')->with('success','Package destroyed successfully');
    }
}
