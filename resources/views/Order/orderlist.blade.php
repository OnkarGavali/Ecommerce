@extends('layouts.sblayout')


@section('content')

<?php $i = 0 ?>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Orders</h2>
            </div>
           
        </div>
    </div>
    
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<thead>
        <tr>
            <th>No</th>
            <th>Product Name</th>
            <th>Product Quantity</th>
            <th> Cost</th>
            <th>Total cost</th>
            
        </tr>
        </thead>
	    @foreach ($OrdersInfo as $order)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $order->Product_name }}</td>
	        <td>{{ $order->Ordered_product_quantity }}</td>
	        <td>{{ $order->Ordered_product_cost }}</td>
            
	        <td>
            
            {{ $order->Ordered_product_total_cost}}
            
            </td>
	       
	    </tr>
	    @endforeach
    </table>
@endsection