@php
    $image ??= 'images/user/user-thumb.jpg';
    $seller ??= null;
    $route = request()->route()->getName();
@endphp
<div class="sidebar">
    <!-- User Widget -->
    <div class="widget user-dashboard-profile">
        <!-- User Image -->
        <div class="profile-thumb">
            @if($seller?->picture)
                <img src="{{$seller?->pictureUrl()}}" alt="" class="rounded-circle">
            @else
                <img src="{{asset($image)}}" alt="" class="rounded-circle">
            @endif
        </div>
        <!-- User Name -->
        <h5 class="text-center">{{$seller?->name}}</h5>
        <p>Joined {{$seller?->created_at}}</p>
        <a href="{{route('admin.profile')}}" class="btn btn-main-sm">Edit Profile</a>
    </div>
    <!-- Dashboard Links -->
    
    <div class="widget user-dashboard-menu">
        <ul>
            <li @class(['active' => str_contains($route, 'admin.order')]) >
                <a href="{{route('admin.order')}}">
                    <i class="fa fa-bookmark-o"></i> Orders <span>{{$dashboard['orders']}}</span>
                </a>
            </li>
            <li @class(['active' => str_contains($route, 'admin.package')]) >
                <a href="{{route('admin.package')}}">
                    <i class="fa fa-user"></i> Packages <span>{{$dashboard['packages']}}</span>
                </a>
            </li>
            <li @class(['active' => str_contains($route, 'admin.product')]) >
                <a href="{{route('admin.product')}}">
                    <i class="fa fa-user"></i> Products <span>{{$dashboard['products']}}</span>
                </a>
            </li>
            <li @class(['active' => str_contains($route, 'admin.category')]) >
                <a href="{{route('admin.category')}}">
                    <i class="fa fa-user"></i> Category <span>{{$dashboard['categories']}}</span>
                </a>
            </li>
            <li>
                <a href="/logout"><i class="fa fa-power-off"></i>Logout</a>
            </li>
        </ul>
    </div>
</div>