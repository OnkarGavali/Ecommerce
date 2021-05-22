@extends('layouts.sblayout')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Client Details</h2>
            </div>
            <div class="pull-right">
                
                <a class="btn btn-success" href="{{ route('clients.create') }}"> Create New Banners</a>
              
            </div>
        </div>
    </div>

<?php $i = 0 ?>
    


<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<thead>
                    <tr>
            <th>No</th>
            <th>Name</th>
            <th>Shop Name</th>
            <th>Mobile number</th>
            <th>Email address</th>
            <th>GST Number</th>
            <th>Shop Address</th>
            <th>Activity Status</th>
            
            
            <th width="280px">Action</th>
        </tr>
        </thead>
	    @foreach ($clients as $owner)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $owner->name }}</td>
	        <td>{{ $owner->shop_name }}</td>
	        <td>{{ $owner->mobile_no }}</td>
	        <td>{{ $owner->email }}</td>
	        <td>{{ $owner->gst_no }}</td>
	        <td>{{ $owner->shop_address }}</td>
	        
            <td>
            @if($owner->status == 1)
            Active
            @else
            InActive
            @endif
            </td>
	        
	        <td>
                    <a class="btn btn-info" href="{{ route('clients.show',$owner->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('clients.edit',$owner->id) }}">Edit</a>

                    @csrf

                    {!! Form::open(['method' => 'DELETE','route' => ['clients.destroy', $owner->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
	        </td>
	    </tr>
	    @endforeach
    </table>
@endsection