@extends('layouts.sblayout')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Owners</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('owners.create') }}"> Create Owner</a>
            </div>
        </div>
    </div>


    


    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Shop Name</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($owners as $owner)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $owner->Owner_name }}</td>
	        <td>{{ $owner->Owner_shop_name }}</td>
	        <td>
                <form action="{{ route('owners.destroy',$owner->Owner_id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('owners.show',$owner->Owner_id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('owners.edit',$owner->Owner_id) }}">Edit</a>

                    @csrf
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>
    {!! $owners->links() !!}
@endsection