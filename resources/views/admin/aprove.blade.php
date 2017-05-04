@extends('layouts.admin')


<link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.css">



@section('content')



<div class="container">
	<div class="row">
		<h2 class="text-left">companies waiting to aprove</h2>
	</div>
    
        <div class="row">
		
            <div class="col-md-12">
            
            
       <table id="data-table"  class="table table-bordered table-hover">
    				<thead class="info">
						<tr>
						   <th>#</th>
							<th>Name</th>
							<th>email</th>
							<th>phone</th>
							<th>address</th>
                             <th>option</th>   
						</tr>
					</thead>

		<tbody>
          
			@foreach($companies as $company)

                 <tr>
						<td>{{$company->company_id}}</td>
						<td>{{$company->user->name}}</td>
						<td>{{$company->user->email}}</td>
						<td>{{$company->user->phone}}</td>
						<td>{{$company->address}}
						 ,
						  {{$company->user->city}}
					
						</td>
						<td>


							<p style="display: inline-block;" title="aprove">
							<a  href="{{url("ad/aprove")}}/{{$company->id}}" class="btn btn-danger btn-xs"
							 data-title="aprove">
							<span class="glyphicon glyphicon-ok">
							</span>
							</a>
							</p>

							<p style="display: inline-block;margin-right: 4px;" data-placement="top" data-toggle="tooltip" title="view">
							<button class="btn btn-primary btn-xs" data-title="view" data-toggle="modal" data-target="#{{$company->id}}" >
							<span class="glyphicon glyphicon-check">
								
							</span>
							</button>
							</p>

     
<!-- view company modal  -->


<div class="modal fade col-md-12 " id="{{$company->id}}" 
   role="dialog">
	<div class="modal-dialog  ">
		<div class="modal-content">

					<div class="modal-header" style="background-color: #353535;">
					<button type="button" class="close" data-dismiss="modal"
					style="color: #f00">x</button>
					<h3 class="modal-title custom_align" id="Heading"
					style="color: #fff">
					View Company Detailes
					</h3>
					</div>


				<div class="modal-body " style="background-color: #192519;">
					<p class="modal-body " style="background-color: #eee">ID:{{$company->company_id}}</p>
					<p class="modal-body " style="background-color: #eee">NAME: {{$company->user->name}}</p>
					<p class="modal-body " style="background-color: #eee">EMAIL: {{$company->user->email}}</p>
					<p class="modal-body " style="background-color: #eee">CITY: {{$company->user->city}}</p>
					<p class="modal-body " style="background-color: #eee">PHONE: {{$company->user->phone}}</p>
					<p class="modal-body " style="background-color: #eee">ADDRESS: {{$company->address}}</p>	

					</div>
				
			  <div class="modal-footer " style="background-color: #353535;">
			 <button type="button" class="btn btn-success btn-lg" data-dismiss="modal">
			 <span class="glyphicon glyphicon-remove"></span> ok </button>
			  </div>
			
		</div>
	</div>
	<!-- /.modal-content --> 
</div>
<!-- end of view modal --> 

			</td>

					
	</tr>
					
			@endforeach
		</tbody>
			
			</table>
		</div>
	</div>
</div>


@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script language="JavaScript" src="https://cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script language="JavaScript" src="https://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.js" type="text/javascript"></script>

<script>
$(document).ready(function() {
    $('#datatable').dataTable();
    
     $("[data-toggle=tooltip]").tooltip();
    
} );

</script>
