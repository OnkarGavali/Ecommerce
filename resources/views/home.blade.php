@extends('layouts.sblayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        
        <h1 class="mt-4"></h1>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Total sell </th>
                    <th>Status</th>
                    
                    
                    
               
                </tr>
            </thead>
        
	    @foreach ($unique_Products as $product)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $product->Product_name }}</td>
	        <td>{{ $product->Product_description }}</td>
            <th>{{ $product->count1 }} </th>
            <td>
                @if($product['Product_status'] == 1)
                    <label class="badge badge-success">{{ __('Active')}}</label>
                @else
                    <label class="badge badge-danger">{{ __('Inactive')}}</label>
                @endif
            </td>
	       
	    </tr>
	    @endforeach
    </table>

      
</div>
@endsection
