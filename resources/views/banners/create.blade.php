@extends('layouts.sblayout')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
            </div>
        </div>
    </div>


    


    <form action="{{ route('banners.store') }}" method="POST" enctype="multipart/form-data">
    	@csrf


         <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Banner_title:</strong>
		            <input type="text" name="Banner_title" class="form-control" placeholder="Banner_title" required>
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12 ">
                <div class="form-group">
                    <strong>Banner_Image_Path:</strong>
                    <input type="file" name="Banner_Image_Path" class="btn btn-link" required >
                </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		            <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>


    </form>

@endsection