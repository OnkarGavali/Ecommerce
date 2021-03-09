@extends('layouts.sblayout')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add Owner</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('owners.index') }}"> Back</a>
            </div>
        </div>
    </div>


    


<form action="{{ route('owners.store') }}" method="POST">
    	@csrf
        <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Name:</strong>
		            <input type="text" name="Owner_name" class="form-control" placeholder="Name" required>
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12 ">
                <div class="form-group">
                    <strong>Shop Name:</strong>
                    <input type="text" name="Owner_shop_name" class="form-control" placeholder="Shop Name" required>
                </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Email:</strong>
		            <input type="text" name="Owner_email" class="form-control" placeholder="Email" required>
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Mobile No.:</strong>
		            <input type="text" name="Owner_mobile_no" class="form-control" placeholder="Mobile No." required>
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>GST No.:</strong>
		            <input type="text" name="Owner_gst_no" class="form-control" placeholder="GST No." required>
		        </div>
		    </div>
            
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		            <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>
    </form>

@endsection