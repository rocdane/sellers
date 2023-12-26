@php
 $orders ??= [];   
@endphp
<div class="widget dashboard-container my-adslist">
    <h3 class="widget-header">Order</h3>
    <table class="table table-responsive product-dashboard-table">
        <thead>
            <tr>
                <th class="text-center">Order</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td class="product-details">
                        <h3 class="title">{{$order->customer?->name}}</h3>
                        <span class="add-id"><strong>Reference:</strong> {{$order->reference}}</span>
                        <span><strong>Created on: </strong><time>{{$order->created_at}}</time> </span>
                        <span @class(['status','active',$order->confirmed? 'text-success' : 'text-warning'])><strong>Confirmation</strong>{{$order->confirmed? 'confirmed' : 'pending'}}</span>
                    </td>
                    <td class="action" data-title="Action">
                        <div class="">
                            <ul class="list-inline justify-content-center">
                                @if(!$order->confirmed)
                                <li class="list-inline-item">
                                    <a class="edit" href="{{route('admin.confirm',$order)}}">
                                        <i class="bi bi-check"></i>
                                    </a>		
                                </li>
                                @endif
                                <li class="list-inline-item">
                                    <a class="delete" href="{{route('admin.cancel',$order)}}">
                                        <i class="bi bi-ban"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="view" href="{{route('admin.view',$order)}}">
                                        <i class="bi bi-eye"></i>
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