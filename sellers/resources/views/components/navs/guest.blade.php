@php
$logo ??= 'images/logo.png';
$route = request()->route()->getName();
$cart = session()->get('cart',[]);
@endphp
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg navigation">
                    <a class="navbar-brand" href="/">
                        <img src="{{asset($logo)}}" alt="">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto main-nav justify-content-end">
                            <li @class(['nav-item', 'active' => str_contains($route, 'guest.home')])>
                                <a class="nav-link" href="{{route('guest.home')}}">Home</a>
                            </li>
                            <li @class(['nav-item', 'active' => str_contains($route, 'guest.product')])>
                                <a class="nav-link" href="{{route('guest.product')}}">Product</a>
                            </li>
                            <li @class(['nav-item', 'active' => str_contains($route, 'guest.about')])>
                                <a class="nav-link" href="{{route('guest.about')}}">About</a>
                            </li>
                            <li @class(['nav-item', 'active' => str_contains($route, 'guest.help')])>
                                <a class="nav-link" href="{{route('guest.help')}}">Help</a>
                            </li>
                            <li @class(['nav-item', 'active' => str_contains($route, 'guest.contact')])>
                                <a class="nav-link" href="{{route('guest.contact')}}">Contact</a>
                            </li>
                        </ul>
                    </div>
                    @if(sizeof($cart) > 0)
                    <a href="{{route('guest.order')}}" class="btn btn-outline-secondary">
                        <i class="bi bi-cart"></i>
                        <span class="badge text-bg-secondary">{{sizeof($cart)}}</span>
                    </a>
                    @endif
                </nav>
            </div>
        </div>
    </div>
</section>