@extends('layouts.sblayout')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Subcategory</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('subcategories.index') }}"> Back</a>
            </div>
        </div>
    </div>




    <form action="{{ route('subcategories.store') }}" method="POST" enctype="multipart/form-data">
    	@csrf


         <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Name:</strong>
		            <input type="text" name="Subcategory_name" class="form-control" placeholder="Name">
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Description:</strong>
		            <textarea class="form-control" style="height:150px" name="Subcategory_description" placeholder="Description"></textarea>
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
                    <strong>Category Id:</strong>
                    <select name="Subcategory_category_id" class="form-control">
                        @foreach($categories as $category)
                        <option value="{{$category->Category_id}}">{{$category->Category_name}}</option>
                        @endforeach
                    </select>
                </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12 ">
                    <div class="form-group">
                        <strong>Image URL:</strong>
                        <input type="file" name="Subcategory_image_url" class="btn btn-link" >
                    </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		        <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>


    </form>

@endsection