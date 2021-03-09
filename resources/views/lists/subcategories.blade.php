@extends('layouts.sblayout')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Sub Categories</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('lists.Category') }}"> Back</a>
            </div>
        </div>
    </div>


   


    <div class="col-md-12">
        <h1 class="mt-4"></h1>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                <th>No</th>
                <th>Sub Category Name</th>
                <th>Sub Category Description</th>
                <th>Category Id</th>
                <th>Sub Category Status</th>
                <th width="280px">Action</th>
            </tr>
            </thead>
        
            @foreach ($subcategories as $subcategory)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $subcategory->Subcategory_name }}</td>
                <td>{{ $subcategory->Subcategory_description }}</td>
                <td>{{ $subcategory->Subcategory_category_id }}</td>
                <td>
                    @if($subcategory->Subcategory_status == 1)
                        <label class="badge badge-success">{{ __('Active')}}</label>
                    @else
                        <label class="badge badge-danger">{{ __('Inactive')}}</label>
                    @endif
                </td>
                <td>
                    <a class="btn btn-primary" href="{{ route('lists.Product',['category'=>$category->Category_id,'subcategory'=>$subcategory->Subcategory_id]) }}">List</a>
                </td>
            </tr>
            @endforeach
        </table>
    



</div>
@endsection