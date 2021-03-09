@extends('layouts.sblayout')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
            </div>
        </div>
    </div>




    <form action="{{ route('products.update',$product->Product_id) }}" method="POST" enctype="multipart/form-data">
    	@csrf
        @method('PUT')


         <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Name:</strong>
		            <input type="text" name="Product_name" value="{{ $product->Product_name }}" class="form-control" placeholder="Name" required>
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Detail:</strong>
		            <textarea class="form-control" style="height:150px" name="Product_description" placeholder="Desription" required>{{ $product->Product_description }}</textarea>
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Dimension:</strong>
		            <input type="text" name="Product_dimension" value="{{ $product->Product_dimension }}" class="form-control" placeholder="Dimension" required>
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Color:</strong>
		            <input type="text" name="Product_color" value="{{ $product->Product_color }}" class="form-control" placeholder="Color" required>
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Prize:</strong>
		            <input type="text" name="Product_prize" value="{{ $product->Product_prize }}" class="form-control" placeholder="Prize" required>
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
			 

            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>Image</th>
                    <th>Upload</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($product_images as $image)
                <tr>
                    
                    <td>{{ ++$i }}</td>
                    <td>
                        @if($product->$image)
                        <img src="{{asset('/storage/files/'.$product->$image)}}" alt="Image" width="100"  />
                        @else
                            {{ $product->$image }}
                        @endif
                    </td>
                    <td>
                        @if($product->$image)
                        <label class="badge badge-success">{{ __('Replace Image')}}</label>
                        @endif
                        <input type="file" name="{{$image}}" class="btn btn-link" >

                    </td>
                    <td>
                        @if($i!='1')
                            @if($product->$image)
                            <label class="badge badge-danger">{{ __('Delete Image')}}</label>
                            <input type="checkbox" name="{{$image.$i}}" value="1"/>
                            @endif
                        @endif
                    </td>
                    
                </tr>
                @endforeach
            </table>

		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		      <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>

    </form>


@endsection