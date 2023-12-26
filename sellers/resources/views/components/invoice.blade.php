@php
$devise = '$';
$rate = 10;
$subtotal = 0;

$items = $order->products()->get();

foreach ($items as $item) {
    $subtotal += $item->price;
}

$tax = $subtotal*$rate/100;

$total = $subtotal + $tax;
@endphp
<div class="invoice-inner" id="invoice_wrapper">
    <div class="invoice-top">
        <div class="row">
            <div class="col-sm-6">
                <div class="logo">
                    <img src={{asset($seller?->pictureUrl())}} alt="logo">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="invoice text-end">
                    <h1>{{$document?->getTitle()}}</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="invoice-titel">
        <div class="row">
            <div class="col-sm-6">
                <div class="invoice-number">
                    <h3>Order reference: {{$order?->reference}}</h3>
                </div>
            </div>
            <div class="col-sm-6 text-end">
                <div class="invoice-date">
                    <h3>Confirmed at: {{$order?->confirmed_at}}</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="invoice-info">
        <div class="row">
            <div class="col-sm-6 mb-30">
                <div class="invoice-number">
                    <h4 class="inv-title-1">Delivered To</h4>
                    <p class="invo-addr-1">
                        {{$seller?->name}} <br/>
                        {{$seller?->email}} <br/>
                        {{$seller?->address}} <br/>
                    </p>
                </div>
            </div>
            <div class="col-sm-6 mb-30">
                <div class="invoice-number text-end">
                    <h4 class="inv-title-1">Bill To</h4>
                    <p class="invo-addr-1">
                        {{$order->customer?->name}} <br/>
                        {{$order->customer?->email}} <br/>
                        {{$order->customer?->address}} <br/>
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 mb-30">
                <h4 class="inv-title-1">Date</h4>
                <p class="inv-from-1">Due Date: {{$order?->created_at}}</p>
            </div>
            <div class="col-sm-6 text-end mb-30">
                <h4 class="inv-title-1">Payment Method</h4>
                <p class="inv-from-1">{{$document?->getPayment()}}</p>
            </div>
        </div>
    </div>
    <div class="order-summary">
        <div class="table-responsive">
            <table class="table invoice-table">
                <thead class="bg-active">
                <tr>
                    <th>Item</th>
                    <th class="text-center">Price ({{$devise}})</th>
                    <th class="text-center">Tax ({{$rate}}%)</th>
                    <th class="text-right">Totals ({{$devise}})</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($items as $item)
                        <tr>
                            <td>
                                <div class="item-desc-1">
                                    <span></span>
                                    <span>{{$item->category?->name}}</span>
                                    <small>{{$item->title}}</small>
                                </div>
                            </td>
                            <td class="text-center">{{$item->price}}</td>
                            <td class="text-center">{{$item->price * $rate/100}}</td>
                            <td class="text-right">{{$item->price * (1 + $rate/100)}}</td>
                        </tr>    
                    @endforeach
                    
                    <tr>
                        <td colspan="3" class="text-end">SubTotal ({{$devise}})</td>
                        <td class="text-right">{{$subtotal}}</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-end">Tax ({{$devise}})</td>
                        <td class="text-right">{{$tax}}</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-end fw-bold">Grand Total ({{$devise}})</td>
                        <td class="text-right fw-bold">{{$total}}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="invoice-informeshon">
        <div class="row">
            <div class="col-md-8 col-sm-8">
                <div class="terms-and-condistions mb-30">
                    <h3 class="inv-title-1">Terms and Conditions</h3>
                    <p class="mb-0">{{$document?->getTerms()}}</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="payment-info mb-30">
                    <h3 class="inv-title-1">Payment Info</h3>
                    <ul class="bank-transfer-list-1">
                        <li><strong>IBAN:</strong> {{$seller?->bank->iban}}</li>
                        <li><strong>BIC:</strong> {{$seller?->bank->name}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="invoice-contact clearfix">
        <div class="row g-0">
            <div class="col-lg-3 col-md-3 col-sm-3">
                <div class="contact-info">
                    <a href=""><i class="fa fa-phone"></i> {{$seller?->phone}}</a>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="contact-info">
                    <a href=""><i class="fa fa-envelope"></i> {{$seller?->email}}</a>
                </div>
            </div>

            <div class="col-lg-5 col-md-5 col-sm-5">
                <div class="contact-info">
                    <a href="" class="mr-0 d-none-580"><i class="fa fa-map-marker"></i> {{$seller?->address}}</a>
                </div>                
            </div>
        </div>
    </div>

</div>