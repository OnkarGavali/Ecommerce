@extends('layouts.sblayout')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Users Management</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
        </div>
    </div>
</div>




<div class="col-md-12">
<h1 class="mt-4"></h1>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<thead>
 <tr>
   <th>No</th>
   <th>Name</th>
   <th>Shop Name</th>
   <th>Mobile No.</th>
   <th>Email</th>
   <th>Roles</th>
   <th>Status</th>
   <th width="280px">Action</th>
 </tr>
 </thead>
 @foreach ($data as $key => $user)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->shop_name }}</td>
    <td>{{ $user->mobile_no }}</td>
    <td>{{ $user->email }}</td>
    <td>
      @if(!empty($user->getRoleNames()))
        @foreach($user->getRoleNames() as $v)
           <label class="badge badge-success">{{ $v }}</label>
        @endforeach
      @endif
    </td>
    <td>
      @if($user['status'] == 1)
        <label class="badge badge-success">{{ __('Active')}}</label>
      @else
        <label class="badge badge-danger">{{ __('Inactive')}}</label>
      @endif
    </td>
    <td>
        <a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
        <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
        @if($user['status'] == 1)
          {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
              {!! Form::submit('Inactive', ['class' => 'btn btn-danger']) !!}
          {!! Form::close() !!}
        @else
          {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
              {!! Form::submit('Active', ['class' => 'btn btn-success']) !!}
          {!! Form::close() !!}
        @endif
    </td>
    
  </tr>
 @endforeach
</table>
</div>

{!! $data->render() !!}

@endsection