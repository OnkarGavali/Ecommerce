@extends('layouts.sblayout')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Category</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('categories.index') }}"> Back</a>
            </div>
        </div>
    </div>


    <form action="{{ route('categories.update',$category->Category_id) }}" method="POST" enctype="multipart/form-data">
    	@csrf
        @method('PUT')


         <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Name:</strong>
		            <input type="text" name="Category_name" value="{{ $category->Category_name }}" class="form-control" placeholder="Name" required>
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Description:</strong>
		            <textarea class="form-control" style="height:150px" name="Category_description" placeholder="Description" required>{{ $category->Category_description }} </textarea>
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Image URL:</strong>
                    <img src="{{asset('/storage/files/'.$category->Category_image_url)}}" alt="Image" width="200"  />
		            <input type="file" name="Category_image_url" value="{{ $category->Category_image_url }}" class="btn btn-link" placeholder="URL" >
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		      <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>


    </form>

@endsection