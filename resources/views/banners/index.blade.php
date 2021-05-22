@extends('layouts.sblayout')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Banners</h2>
            </div>
            <div class="pull-right">
                
                <a class="btn btn-success" href="{{ route('banners.create') }}"> Create New Banners</a>
              
            </div>
        </div>
    </div>



<?php $i = 0 ?>

    <div class="col-md-12">
    <h1 class="mt-4"></h1>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
        <tr>
            <th>No</th>
            <th>Title</th>
            <th>Banner Image</th>
            <th width="280px">Action</th>
        </tr>
        </thead>
	    @foreach ($banners as $g)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $g->Banner_title }}</td>
	        <td>
            <img src="{{asset('/storage/files/'.$g->Banner_Image_Path)}}" alt="Image" width="200"  />            
            </td>
            
	        <td>
                <form action="{{ route('banners.destroy',$g->Banner_id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('banners.show',$g->Banner_id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('banners.edit',$g->Banner_id) }}">Edit</a>


                    @csrf
                    @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete </button>
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>
</div>

@endsection