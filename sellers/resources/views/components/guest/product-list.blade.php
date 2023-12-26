@php
$cart = session()->get('cart',[]);
@endphp

<div class="product-grid-list">
    <div class="row mt-30">
        @foreach($products as $product)
        <div class="col-sm-12 col-lg-4 col-md-6">
            <!-- product card -->
            <div class="product-item bg-light">
                <div class="card">
                    <div class="thumb-content">
                        <div class="price">
                            <i class="bi bi-currency-dollar"></i> 
                            {{number_format($product->price, thousands_separator: ' ')}}
                        </div>
                        <a href="{{route('guest.item', $product)}}">
                            <img class="card-img-top img-fluid" src="{{$product->mediaUrl()}}" alt="Card image cap">
                        </a>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title"><a href="{{route('guest.item', $product)}}">{{$product->title}}</a></h4>
                        <ul class="list-inline product-meta">
                            <li class="list-inline-item">
                                <a href=""><i class="fa fa-folder-open-o"></i>{{$product->category?->name}}</a>
                            </li>
                            <li class="list-inline-item">
                                <a href=""><i class="fa fa-calendar"></i>{{$product->created_at}}</a>
                            </li>
                        </ul>
                        <div class="row text-center justity-content-between align-content-center">
                            <div class="col-6">
                                <a href="{{route('guest.item', $product)}}" class="btn btn-outline-warning">
                                    <i class="bi bi-eye">{{$product->view}}</i>
                                </a>
                            </div>
                            <div class="col-6">
                                @if(!isset($cart[$product->id]))
                                <a href="{{route('guest.pick', $product)}}" class="btn btn-outline-secondary">
                                    <i class="bi bi-bag-plus-fill"></i>
                                </a>
                                @else
                                <a href="{{route('guest.drop', $product)}}" class="btn btn-outline-primary">
                                    <i class="bi bi-bag-check-fill"></i>
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<div class="pagination justify-content-center">
    {{$products->links()}}
</div>