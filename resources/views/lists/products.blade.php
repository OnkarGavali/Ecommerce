@extends('layouts.sblayout')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Products</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
            </div>
        </div>
    </div>


    <div class="col-md-12">
        <h1 class="mt-4"></h1>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Dimension</th>
                    <th>Color</th>
                    <th>Prize</th>
                    <th>Subcategory Id</th>
                    <th>Status</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
        
	    @foreach ($products as $product)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $product->Product_name }}</td>
	        <td>{{ $product->Product_description }}</td>
            <td>{{ $product->Product_dimension }}</td>
            <td>{{ $product->Product_color }}</td>
            <td>{{ $product->Product_prize }}</td>
            <td>{{ $product->Product_subcategory_id }}</td>
            <td>
                @if($product->Product_status == 1)
                    <label class="badge badge-success">{{ __('Active')}}</label>
                @else
                    <label class="badge badge-danger">{{ __('Inactive')}}</label>
                @endif
            </td>
	        <td>
                
	        </td>
	    </tr>
	    @endforeach
    </table>

</div>
@endsection