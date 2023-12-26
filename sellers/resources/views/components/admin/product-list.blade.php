@php
 $products ??= [];   
@endphp
<div class="d-flex justify-content-between align-items-center">
    <h1>Product List</h1>

    <a href="{{route('admin.ads')}}" class="btn btn-primary">Add Product</a>
</div>
<div class="widget dashboard-container my-adslist">
    <h3 class="widget-header">My Ads</h3>
    <table class="table table-responsive product-dashboard-table">
        <thead>
            <tr>
                <th>Image</th>
                <th>Product</th>
                <th class="text-center">Category</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td class="product-thumb">
                        <img width="80px" height="auto" src="{{$product->mediaUrl()}}" alt="image description">
                    </td>
                    <td class="product-details">
                        <h3 class="title">{{$product->title}}</h3>
                        <span><strong>Posted on: </strong><time>{{$product->created_at}}</time> </span>
                        <span class="status active"><strong>Status</strong>{{$product->sold ? 'sold' : 'available'}}</span>
                        <span class="location"><strong>Price</strong>{{number_format($product->price, thousands_separator: ' ')}} $</span>
                    </td>
                    <td class="product-category"><span class="categories">{{$product->category?->name}}</span></td>
                    <td class="action" data-title="Action">
                        <div class="">
                            <ul class="list-inline justify-content-center">
                                <li class="list-inline-item">
                                    <form action="{{route('admin.archive', $product)}}" method="POST">
                                        @csrf
                                        <button class="btn btn-outline-danger"><i class="bi bi-trash-fill"></i></button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
</div>