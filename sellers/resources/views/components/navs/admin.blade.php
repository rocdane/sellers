@php
$logo = "images/logo.png";
$route = request()->route()->getName();
@endphp
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg navigation sticky-top">
                    <a class="navbar-brand" href="/admin">
                        <img src="{{asset($logo)}}" alt="">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto main-nav justify-content-end">
                            <li @class(['nav-item', 'active' => str_contains($route, 'admin.index')])>
                                <a class="nav-link" href="{{route('admin.index')}}">Dashboard</a>
                            </li>
                            <li @class(['nav-item', 'active' => str_contains($route, 'admin.product')])>
                                <a class="nav-link" href="{{route('admin.product')}}">Product</a>
                            </li>
                            <li @class(['nav-item', 'active' => str_contains($route, 'admin.order')])>
                                <a class="nav-link" href="{{route('admin.order')}}">Order</a>
                            </li>
                        </ul>
                        @if (Route::has('login'))
						<ul class="navbar-nav ml-auto mt-10">
                            @auth
							<li class="nav-item">
								<a class="nav-link add-button" href="{{route('admin.ads')}}"><i class="fa fa-plus-circle"></i> Add Listing</a>
							</li>
                            @else
                            <li class="nav-item">
								<a class="nav-link login-button" href="/login">Login</a>
							</li>
                            @endauth
						</ul>
                        @endif
                    </div>
                </nav>
            </div>
        </div>
    </div>
</section>