@extends('layouts.sblayout')


@section('content')

<?php $i = 0 ?>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Orders</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('orders.create') }}"> Register new order</a>
            </div>
        </div>
    </div>
    
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<thead>
        <tr>
            <th>No</th>
            <th>Shop Name</th>
            <th>Product Quantity</th>
            <th>Total Cost</th>
            <th>Current Status</th>
            <th width="280px">Action</th>
        </tr>
        </thead>
	    @foreach ($OrderInfo as $order)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $order->shop_name }}</td>
	        <td>{{ $order->Order_product_quantity }}</td>
	        <td>{{ $order->Order_total_cost }}</td>
	        <td>
            
            @if($order->Order_status == 0)
            Order Received
            @endif
            @if($order->Order_status == 1)
            Order Accepted
            @endif
            @if($order->Order_status == 2)
            Order Delivered
            @endif
            @if($order->Order_status == 3)
            Order Rejected
            @endif
            
            
            </td>
	        <td>
            <center>

                <form action="{{ route('orders.destroy',$order->Order_id) }}" method="POST">
                @if($order->Order_status == 0)
                    <a class="btn btn-success" href="{{ route('orders.show',$order->Order_id) }}">Accept Order</a>
                    <a class="btn btn-danger" href="{{ route('orders.destroy',$order->Order_id) }}">Reject Order</a>
                @endif
                @if($order->Order_status == 1)
                <a class="btn btn-primary" href="{{ route('orders.edit',$order->Order_id) }}">Mark as Delivered</a>
                @endif
                @if($order->Order_status == 2)
                <h4>Order Delivered<h4>
                @endif
                @if($order->Order_status == 3)
                <a class="btn btn-warning" href="{{ route('orders.show',$order->Order_id) }}">Accept Rejected Order</a>
                @endif
                
                    @csrf
                </form>
                </center>

	        </td>
	    </tr>
	    @endforeach
    </table>
@endsection