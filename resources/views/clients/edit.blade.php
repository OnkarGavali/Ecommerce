@extends('layouts.sblayout')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Client Details</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('clients.index') }}"> Back</a>
            </div>
        </div>
    </div>


    


    <form action="{{ route('clients.update',$ClientDetails->id) }}" method="POST">
    	@csrf
        @method('PUT')


         <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Name:</strong>
		            <input type="text" name="name" value="{{ $ClientDetails->name }}" class="form-control" placeholder="Name" required>
		        </div>
		    </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Shop Name:</strong>
		            <input type="text" name="shop_name" value="{{ $ClientDetails->shop_name }}" class="form-control" placeholder="Name" required>
		        </div>
		    </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>mobile_no:</strong>
		            <input type="text" name="mobile_no" value="{{ $ClientDetails->mobile_no }}" class="form-control" placeholder="Name" required>
		        </div>
		    </div>

			<div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>email:</strong>
		            <input type="text" name="email" value="{{ $ClientDetails->email }}" class="form-control" placeholder="Name" required>
		        </div>
		    </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>gst_no:</strong>
		            <input type="text" name="gst_no" value="{{ $ClientDetails->gst_no }}" class="form-control" placeholder="Name" required>
		        </div>
		    </div>

            
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>shop_address:</strong>
		            <input type="text" name="shop_address" value="{{ $ClientDetails->shop_address }}" class="form-control" placeholder="Name" required>
		        </div>
		    </div>

            
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>shop_pincode:</strong>
		            <input type="text" name="shop_pincode" value="{{ $ClientDetails->shop_pincode }}" class="form-control" placeholder="Name" required>
		        </div>
		    </div>

            
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>status:</strong>
                    <select name="status" class="form-control">
                    <option value="0" required>InActive</option>
                    <option value="1" required>Active</option>
                    </select>
		        </div>
		    </div>
            
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		      <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>


    </form>


@endsection