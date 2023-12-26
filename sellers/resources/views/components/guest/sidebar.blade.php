<div class="category-sidebar">
    <div class="widget category-list">
        <h4 class="widget-header">All Category</h4>
        <ul class="category-list">
            @foreach($categories as $category)
            <li><a href="{{route('guest.product')}}">{{$category->name}} <span>{{count($category->products)}}</span></a></li>
            @endforeach
        </ul>
    </div>
</div>