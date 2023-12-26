@php
$cart = session()->get('cart',[]);
@endphp
<x-guest-layout>
    <!--===================================
    =            Store Section            =
    ====================================-->
    <section class="section bg-gray">
        <!-- Container Start -->
        <div class="container">
            <div class="row">
                <!-- Left sidebar -->
                <div class="col-md-8">
                    <div class="product-details">
                        <h1 class="product-title">{{$item->title}}</h1>
                        <div class="product-meta">
                            <ul class="list-inline">
                                <li class="list-inline-item"><i class="bi bi-folder"></i> {{$item->category->name}}</li>
                                <li class="list-inline-item"><i class="bi bi-calendar"></i> {{$item->created_at}}</li>
                            </ul>
                        </div>
                        <div id="carouselExampleIndicators" class="product-slider carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                @for($i = 0; $i < sizeof($item->pictures); $i++)
                                    <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}" @class([$i==0 ? 'active' : ''])></li>
                                @endfor
                            </ol>
                            <div class="carousel-inner">
                                @foreach($item->picturesUrl() as $key => $picture)
                                    <div @class(['carousel-item',$key==0?'active':''])>
                                        <img class="d-block w-100" src={{asset($picture['name'])}} alt="Slide">
                                    </div>
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <div class="content">
                            <h3 class="tab-title">Product Description</h3>
                            <p>{{$item->description}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="sidebar">
                        <div class="widget price text-center">
                            <h4>Price</h4>
                            <p>$ {{$item->price}}</p>
                        </div>
                        <!-- User Profile widget -->
                        <div class="widget user text-center">
                            @if(!isset($cart[$item->id]))
                            <a href="{{route('guest.pick',$item)}}" class="btn btn-outline-secondary">
                                <i class="bi bi-bag-plus-fill"></i>
                                Pick
                            </a>
                            @else
                            <a href="{{route('guest.drop',$item)}}" class="btn btn-outline-primary">
                                <i class="bi bi-bag-check-fill"></i>
                                Drop
                            </a>
                            @endif
                            <a href="{{route('guest.contact')}}" class="btn btn-outline-primary">
                                <i class="bi bi-envelope-fill"></i>
                                Contact
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container End -->
    </section>
</x-guest-layout>