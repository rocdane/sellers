@php
 $categories ??= [];
@endphp
<div class="d-flex justify-content-between align-items-center">
    <h1>Add new category</h1>
    <a href="{{route('admin.create')}}" class="btn btn-primary">Create Category</a>
</div>
<div class="widget dashboard-container my-adslist">
    <h3 class="widget-header">Category</h3>
    <table class="table table-responsive product-dashboard-table">
        <thead>
            <tr>
                <th>Category</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td class="product-details">
                        <h3 class="title">{{$category->name}}</h3>
                    </td>
                    <td class="action" data-title="Action">
                        <div class="">
                            <ul class="list-inline justify-content-center">
                                <li class="list-inline-item">
                                    <form action="{{route('admin.delete', $category)}}" method="POST">
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