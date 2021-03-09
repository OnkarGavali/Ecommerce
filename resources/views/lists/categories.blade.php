@extends('layouts.sblayout')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Categories</h2>
            </div>
        </div>
    </div>

    <div class="col-md-12">
    <h1 class="mt-4"></h1>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr>
            <th>No</th>
            <th>Category Name</th>
            <th>Category Description</th>
            <th>Category Status</th>
            <th width="280px">Action</th>
        </tr>
        </thead>
	    @foreach ($categories as $category)
	    <tr>
	        
            <td>{{ ++$i }}</td>
	        <td>{{ $category->Category_name }}</td>
	        <td>{{ $category->Category_description }}</td>
            <td>
                @if($category->Category_status == 1)
                    <label class="badge badge-success">{{ __('Active')}}</label>
                @else
                    <label class="badge badge-danger">{{ __('Inactive')}}</label>
                @endif
            </td>
	        <td>
                <a class="btn btn-primary" href="{{ route('lists.SubCategory',$category->Category_id) }}">List</a>
	        </td>
            
	    </tr>
	    @endforeach
    </table>
    

    

</div>

@endsection