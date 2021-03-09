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


    


    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    	@csrf


         <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Name:</strong>
		            <input type="text" name="Product_name" class="form-control" placeholder="Name" required>
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Description:</strong>
		            <textarea class="form-control" style="height:150px" name="Product_description" placeholder="Description" required></textarea>
		        </div>
		    </div>


            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Dimension:</strong>
		            <input type="text" name="Product_dimension" class="form-control" placeholder="Dimension" required>
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Color:</strong>
		            <input type="text" name="Product_color" class="form-control" placeholder="Color" required>
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Prize:</strong>
		            <input type="text" name="Product_prize" class="form-control" placeholder="Prize" required>
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
                    <strong>Category Id:</strong>
                    <select name="Product_subcategory_id" class="form-control">
                        @foreach($subcategories as $subcategory)
                        <option value="{{$subcategory->Subcategory_id}}" required>{{$subcategory->Subcategory_name}}</option>
                        @endforeach
                    </select>
                </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12 ">
                <div class="form-group">
                    <strong>Image URL1:</strong>
                    <input type="file" name="Product_image_url1" class="btn btn-link" required >
                </div>
		    </div>
             <div class="col-xs-12 col-sm-12 col-md-12 ">
                <div class="form-group">
                    <strong>Image URL2:</strong>
                    <input type="file" name="Product_image_url2" class="btn btn-link" >
                </div>
		    </div>
             <div class="col-xs-12 col-sm-12 col-md-12 ">
                <div class="form-group">
                    <strong>Image URL3:</strong>
                    <input type="file" name="Product_image_url3" class="btn btn-link" >
                </div>
		    </div>
             <div class="col-xs-12 col-sm-12 col-md-12 ">
                <div class="form-group">
                    <strong>Image URL4:</strong>
                    <input type="file" name="Product_image_url4" class="btn btn-link" >
                </div>
		    </div>
             <div class="col-xs-12 col-sm-12 col-md-12 ">
                <div class="form-group">
                    <strong>Image URL5:</strong>
                    <input type="file" name="Product_image_url5" class="btn btn-link" >
                </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		            <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>


    </form>

@endsection