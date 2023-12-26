@php
 $packages ??= [];   
@endphp
<div class="widget dashboard-container my-adslist">
    <h3 class="widget-header">Package</h3>
    <table class="table table-responsive product-dashboard-table">
        <thead>
            <tr>
                <th>Package</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($packages as $package)
                <tr>
                    <td class="product-details">
                        <h3 class="title">{{$package->name}}</h3>
                        <span class="add-id"><strong>Wrapped on:</strong> {{$package->created_at}}</span>
                        <span class="add-id"><strong>Shipped on:</strong> {{$package->shipped_at}}</span>
                    </td>
                    <td class="action" data-title="Action">
                        <div class="">
                            <ul class="list-inline justify-content-center">
                                <li class="list-inline-item">
                                    <a class="edit" href="{{route('admin.package.edit',['package',$package])}}">
                                        <i class="fa fa-pencil"></i>
                                    </a>		
                                </li>
                                <li class="list-inline-item">
                                    <a class="delete" href="{{route('admin.package.destroy',['package',$package])}}">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>