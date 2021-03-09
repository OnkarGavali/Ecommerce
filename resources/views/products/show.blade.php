@extends('layouts.sblayout')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $product->Product_name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                {{ $product->Product_description }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Dimension:</strong>
                {{ $product->Product_dimension }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Color:</strong>
                {{ $product->Product_color }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>prize:</strong>
                {{ $product->Product_prize }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Subcategory Id:</strong>
                {{ $product->Product_subcategory_id }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status:</strong>
                @if($product['Product_status'] == 1)
                    <label class="badge badge-success">{{ __('Active')}}</label>
                @else
                    <label class="badge badge-danger">{{ __('Inactive')}}</label>
                @endif
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Image:</strong>
                <img src="{{asset('/storage/files/'.$product->Product_image_url1)}}" alt="Image" width="200"  />
                @if($product->Product_image_url2)
                <img src="{{asset('/storage/files/'.$product->Product_image_url2)}}" alt="Image" width="200"  />
                @endif
                @if($product->Product_image_url3)
                <img src="{{asset('/storage/files/'.$product->Product_image_url3)}}" alt="Image" width="200"  />
                @endif
                @if($product->Product_image_url4)
                <img src="{{asset('/storage/files/'.$product->Product_image_url4)}}" alt="Image" width="200"  />
                @endif
                @if($product->Product_image_url5)
                <img src="{{asset('/storage/files/'.$product->Product_image_url5)}}" alt="Image" width="200"  />
                @endif
            </div>
        </div>
    </div>
@endsection