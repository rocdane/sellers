<!--============================
=            Footer            =
=============================-->

<footer class="footer section section-sm">
    <!-- Container Start -->
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 offset-lg">
                <!-- About -->
                <div class="block about">
                <!-- footer logo -->
                <img src="{{asset('images/logo-footer.png')}}" alt="">
                <!-- description -->
                <p class="alt-color">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
            </div>
            <!-- Link list -->
            <div class="col-lg-3 col-md-3 offset-lg">
                <div class="block">
                <h4>Site Pages</h4>
                <ul>
                    <li><a href="{{route('guest.home')}}">Home</a></li>
                    <li><a href="{{route('guest.about')}}">About Us</a></li>
                    <li><a href="{{route('guest.legal')}}">Legal</a></li>
                </ul>
                </div>
            </div>
            <!-- Link list -->
            <div class="col-lg-3 col-md-3 offset-lg">
                <div class="block">
                <h4>Admin Pages</h4>
                <ul>
                    <li><a href="{{route('admin.index')}}">Admin</a></li>
                    <li><a href="{{route('admin.category')}}">Category</a></li>
                    <li><a href="{{route('admin.product')}}">Product</a></li>
                </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Container End -->
</footer>

<!-- Footer Bottom -->
<footer class="footer-bottom">
    <!-- Container Start -->
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-12">
            <!-- Copyright -->
            <div class="copyright">
                <p>Copyright © {{ now()->year }}. All Rights Reserved</p>
            </div>
            </div>
            <div class="col-sm-6 col-12">
            <!-- Social Icons -->
            <ul class="social-media-icons text-right">
                <li><a class="fa fa-facebook" href=""></a></li>
                <li><a class="fa fa-twitter" href=""></a></li>
                <li><a class="fa fa-pinterest-p" href=""></a></li>
                <li><a class="fa fa-vimeo" href=""></a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Container End -->
    <!-- To Top -->
    <div class="top-to">
        <a id="top" href=""><i class="fi bi-caret-up-fill"></i></a>
    </div>
</footer>