@extends('layouts.sblayout')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Products</h2>
            </div>
            <div class="pull-right">
                @can('product-create')
                <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
                @endcan
            </div>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Description</th>
            <th>Size</th>
            <th>Color</th>
            <th>Prize</th>
            <th>Subcategory Id</th>
            <th>Status</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($products as $product)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $product->Product_name }}</td>
	        <td>{{ $product->Product_description }}</td>
            <td>{{ $product->Product_size }}</td>
            <td>{{ $product->Product_color }}</td>
            <td>{{ $product->Product_prize }}</td>
            <td>{{ $product->Product_subcategory_id }}</td>
            <td>{{ $product->Product_status }}</td>
	        <td>
                <form action="{{ route('products.destroy',$product->Product_id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('products.show',$product->Product_id) }}">Show</a>
                    @can('product-edit')
                    <a class="btn btn-primary" href="{{ route('products.edit',$product->Product_id) }}">Edit</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('product-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


    {!! $products->links() !!}


<p class="text-center text-primary"><small>Tutorial by ItSolutionStuff.com</small></p>
@endsection