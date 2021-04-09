@extends('layouts.sblayout')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>clients</h2>
            </div>
            <div class="pull-right">
            </div>
        </div>
    </div>

<?php $i = 0 ?>
    


    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Shop Name</th>
            <th width="280px">Action</th>
        </tr>
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
                <form action="{{ route('clients.destroy',$owner->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('clients.show',$owner->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('clients.edit',$owner->id) }}">Edit</a>

                    @csrf
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>
@endsection