<?php

namespace App\Http\Controllers;

use PDF;

use App\Api\OrderBuilder;
use App\Api\Item;
use App\Models\Order;
use App\Models\Customer;

use App\Services\IProductService;
use App\Services\IOrderService;
use App\Services\ICustomerService;
use App\Http\Controllers\Controller;

use App\Http\Requests\OrderFormRequest;
use App\Http\Requests\ContactFormRequest;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class GuestController extends Controller
{
    private IProductService $productService;
    private IOrderService $orderService;
    private ICustomerService $customerService;
    private OrderBuilder $orderBuilder;
    private Order $order;

    public function __construct(
        IProductService $productService,
        IOrderService $orderService,
        ICustomerService $customerService
    ) {
        $this->orderBuilder = new OrderBuilder();
        $this->productService = $productService;
        $this->orderService = $orderService;
        $this->customerService = $customerService;
    }

    public function home(): View
    {
        $popular = $this->productService->getPopular(3);
        return view('guest.index',['products'=>$popular]);
    }

    public function product(): View
    {
        $available = $this->productService->getAvailable(6);
        return view('guest.product',['products'=>$available]);
    }

    public function item($id): View
    {
        $item = $this->productService->getById($id);
        $item->increment('view');

        return view('guest.single',['item'=>$item]);
    }

    public function pick($id)
    {
        $item = $this->productService->getById($id);

        $cart = session()->get('cart',[]);
        
        if(!isset($cart[$id])){
            $cart[$id] = $item;
        }
        
        session()->put('cart',$cart);

        return redirect()->back()->with('success','Product added to cart successfully');
    }

    public function drop($id)
    {
        $item = $this->productService->getById($id);

        $cart = session()->get('cart',[]);
        
        if(isset($cart[$id])){
            unset($cart[$id]);
            session()->put('cart',$cart);    
        }
        
        return redirect()->back()->with('success','Product removed from cart successfully');
    }

    public function order(): View
    {
        return view('guest.order');
    }

    public function confirm(OrderFormRequest $request)
    {
        $data = $request->validated();

        $customer = $this->customerService->create($data);

        $items = session()->get('cart',[]);

        $orderBuilder = new OrderBuilder();

        $order = $orderBuilder->buildOrder();
        
        foreach ($items as $item) {
            $order->addItem($item);
        }

        $order->customer()->associate($customer);
        $order->save();
        if($order->validate()){
            // send email to customer
            // send email to seller
        }
    
        session()->put('cart',[]);

        return to_route('guest.product')->with('success','Order registrated successfully.');
    }

    public function about(): View
    {
        return view('guest.about');
    }

    public function help(): View
    {
        return view('guest.help');
    }

    public function contact(): View
    {
        return view('guest.contact');
    }

    public function send(ContactFormRequest $request)
    {
        $data = $request->validated();

        dd($data);
        //send contact email
        return to_route('guest.home')->with('success','Message sent successfully.');
    }

    public function cgv(): View
    {
        return view('cgv');
    }

    public function policy(): View
    {
        return view('policy');
    }

    public function legal(): View
    {
        return view('legal');
    }
}
