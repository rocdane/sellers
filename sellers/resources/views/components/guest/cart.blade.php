<div class="container">
    <div class="row">
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{$item->title}}</td>
                        <td>{{$item->price}} $</td>
                        <td>
                            <a href="{{route('guest.drop',$item)}}" class="btn btn-outline-danger">
                                <i class="bi bi-trash"></i>
                            </a>
                        </td>
                    </tr>    
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td class="text-right">
                        <a href="{{url('/product')}}" class="btn btn-primary">
                            <i class="bi bi-arrow-left">Continue Shopping</i>
                        </a>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>