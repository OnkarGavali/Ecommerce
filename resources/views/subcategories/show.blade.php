@extends('layouts.sblayout')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Sub Category</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('subcategories.index') }}"> Back</a>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $subcategory->Subcategory_name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Discription:</strong>
                {{ $subcategory->Subategory_description }}
            </div>
        </div>
    </div>
@endsection