@extends('layouts.sblayout')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Sub Categories</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('subcategories.create') }}"> Create New Sub Category</a>
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
            <th>Sub Category Name</th>
            <th>Sub Category Description</th>
            <th>Category Id</th>
            <th>Sub Category Status</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($subcategories as $subcategory)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $subcategory->Subcategory_name }}</td>
	        <td>{{ $subcategory->Subcategory_description }}</td>
            <td>{{ $subcategory->Subcategory_category_id }}</td>
            <td>{{ $subcategory->Subcategory_status }}</td>
	        <td>
                <form action="{{ route('subcategories.destroy',$subcategory->Subcategory_id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('categories.show',$subcategory->Subcategory_id) }}">Show</a>
            
                    <a class="btn btn-primary" href="{{ route('subcategories.edit',$subcategory->Subcategory_id) }}">Edit</a>


                    @csrf
                    @method('DELETE')
                
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


    {!! $subcategories->links() !!}


@endsection