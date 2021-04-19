@extends('layouts.sblayout')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add Order</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('orders.index') }}"> Back</a>
            </div>
        </div>
    </div>


    


<form action="{{ route('orders.store') }}" method="POST">
    	@csrf
        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
                    <strong>Select Client:</strong>
                    <select name="Product_subcategory_id" class="form-control">
                        @foreach($usersInfo as $users)
                        <option value="{{$users->id}}" required>{{$users->name}}</option>
                        @endforeach
                    </select>
                </div>
                <table class="table table-bordered">
<thead>
<th>Type of Medicine</th>
<th>Name of medicine</th>
<th>Quantity</th>
<th> Morning</th>
<th> Afternoon</th>
<th> Night</th>
<button type="button" onClick="addRow()" class="btn btn-primary addRow"> + Add medicine </button>
<br>
</thead>
<tbody>
</tbody>
   </table>
		    </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		            <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>
    </form>

@endsection


<script type="text/javascript">
$('.addRow').on('click', function(){
 addRow();
});

function addRow()
{
 
        var tr =  '<tr>' +
            '<td>' + 
            '<div class="col-xs-12 col-sm-12 col-md-12">' +
            '<div class="form-group">        '+
            '<div class="col-xs-12 col-sm-12 col-md-12">'+
            '    <div class="form-group">' +
            '<select class="form-control" name="Medicine_Type[]" required>'+
            '<option value="0"> '+
            'Tablet'+
            '</option>'+
            '<option value="1"> '+
            'Injection'+
            '</option> <option value="2"> Syrup</option>'+
            '<option value="3">Saline</option></select>'+
            '</div></div></div></div></div></td><td><div class="col-xs-12 col-sm-12 col-md-12"><div class="form-group">' +
            '{!! Form::text("Medicine_name[]", null, array("placeholder" => "Medicine Name","class" => "form-control", "required")) !!}'+
            '</div></div></td><td><div class="col-xs-12 col-sm-12 col-md-12">        <div class="form-group">        '+
            '    {!! Form::number("Medicine_quantity[]", null, array("placeholder" => "Quantity","class" => "form-control", "required")) !!}  '+
            '      </div>    </div>    </td>   '+
            '<td><select class="form-control" name="morning[]">'+
            '<option value="1"> YES </option> '+
            '<option value="0"> NO </option></td>'+

            '<td><select class="form-control" name="afternoon[]">'+
            '<option value="1"> YES </option> '+
            '<option value="0"> NO </option> </td>'+

            '<td><select class="form-control" name="night[]">'+
            '<option value="1"> YES </option> '+
            '<option value="0"> NO </option> </td>'+
            
            '<button type="button" onClick="deletethis()" class="btn btn-danger"> - </button>'+
            '        </td>   </tr>'+
  '          <button type="button" onClick="addRow()" class="btn btn-primary addRow"> + Add medicine </button>'  ; 
  $('tbody').append(tr);
};

$('tbody').on('click', '.remove', function(){
  $(this).parent().parent().remove();
  });

</script>