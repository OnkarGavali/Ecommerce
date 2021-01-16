@extends('layouts.sblayout')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Categories</h2>
            </div>
            <div class="pull-right">
                @can('category-create')
                <a class="btn btn-success" href="{{ route('categories.create') }}"> Create New Category</a>
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
            <th>Category Name</th>
            <th>Category Description</th>
            <th>Category Status</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($categories as $category)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $category->Category_name }}</td>
	        <td>{{ $category->Category_description }}</td>
            <td>{{ $category->Category_status }}</td>
	        <td>
                <form action="{{ route('categories.destroy',$category->Category_id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('categories.show',$category->Category_id) }}">Show</a>
                    @can('category-edit')
                    <a class="btn btn-primary" href="{{ route('categories.edit',$category->Category_id) }}">Edit</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('category-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


    {!! $categories->links() !!}


<p class="text-center text-primary"><small>Tutorial by ItSolutionStuff.com</small></p>
@endsection