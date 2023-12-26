<x-guest-layout>
    <x-partials.barner />

    <!--===========================================
    =            Popular deals section            =
    ============================================-->
    
    <section class="popular-deals section bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title">
                        <h2>Trending Ads</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas, magnam.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($products as $product)
                <!-- offer 01 -->
                <div class="col-sm-12 col-lg-4">
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
                                        <i class="bi bi-folder"></i> {{$product->category->name}}
                                    </li>
                                    <li class="list-inline-item">
                                        <i class="bi bi-calendar"></i><strong> {{$product->created_at}}</strong>
                                    </li>
                                    <li class="list-inline-item">
                                        <i class="bi bi-eye"></i> <strong> {{$product->view}}</strong>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach     
            </div>
        </div>
    </section>
    
</x-guest-layout>