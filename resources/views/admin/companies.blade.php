@extends('layouts.admin')


<link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.css">



@section('content')

<div class="container">
	<div class="row">
		<h2 class="text-left">companies</h2>
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
							<th>rating</th>
							
                             <th>option</th>
                             
						</tr>
					</thead>
			<tbody>

				@foreach($companies as $company)
              
					<tr>
						<td>{{$company->id}}</td>
						<td>{{$company->name}}</td>
						<td>{{$company->email}}</td>
						<td>{{$company->phone}}</td>

						<td>{{$company->company->address}}
						 ,
						  {{$company->city}}</td>
						<td style="width: 100px;">  
					    <div id="stars" class="pull-right">
                            @for($i=0; $i<round($company->company->rating); $i++)
                                <i class="fa fa-star" style="color: #90902d" aria-hidden="true"></i>
                            @endfor
                            @for($i=5; $i>round($company->company->rating); $i--)
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                            @endfor
                        </div>
						</td>
						</td>
						

						<td>

							<p style="display: inline-block;margin-right: 4px;" data-placement="top" data-toggle="tooltip" title="view">
							<button class="btn btn-primary btn-xs" data-title="view" data-toggle="modal" data-target="#{{$company->id}}" >
							<span class="glyphicon glyphicon-check">
								
							</span>
							</button>
							</p>
							
							<p style="display: inline-block;"  data-placement="top" data-toggle="tooltip" title="Delete">
							<button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#Delete{{$company->id}}" >
							<span class="glyphicon glyphicon-trash">
							</span>
							</button>
							</p>
             
			<!-- edit company modal  -->


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
								<p class="modal-body " style="background-color: #eee">ID: {{$company->id}}</p>
								<p class="modal-body " style="background-color: #eee">NAME: {{$company->name}}</p>
								<p class="modal-body " style="background-color: #eee">EMAIL: {{$company->email}}</p>
								<p class="modal-body " style="background-color: #eee">CITY: {{$company->city}}</p>
								<p class="modal-body " style="background-color: #eee">PHONE: {{$company->phone}}</p>
								<p class="modal-body " style="background-color: #eee">ADDRESS: {{$company->company->address}}</p>
								<p class="modal-body " style="background-color: #eee">CREATED-AT: {{$company->created_at}}</p>


								

								</div>
							
						  <div class="modal-footer " style="background-color: #353535;">
						 <button type="button" class="btn btn-success btn-lg" data-dismiss="modal">
						 <span class="glyphicon glyphicon-remove"></span> ok </button>
						  </div>
						
					</div>
				</div>
				<!-- /.modal-content --> 
			</div>
			<!-- /.modal-dialog --> 
					
										
				<div class="modal fade" id="Delete{{$company->id}}"  role="dialog" >
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header" style="background-color: #353535;">
							<button type="button" class="close" data-dismiss="modal" 
							style="color: #f00">
							x

							</button>
							<h4 class="modal-title custom_align" id="Heading" 
							style="color: #fff">move to trashed</h4>
							</div>

							<div class="modal-body" style="background-color: #192519;">

							<div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to move {{$company->name}} to trashed company ?</div>

							</div>

							<div class="modal-footer " style="background-color: #353535;">
							
							<a href="{{url('ad/companies')}}/{{$company->id}}" 
							 class="btn btn-success" >
							 <span class="glyphicon glyphicon-ok-sign"></span>
							  Yes
							 </a>
						
						<button type="button" class="btn btn-default" data-dismiss="modal">
							<span class="glyphicon glyphicon-remove">
								
							</span> No</button>
						</div>
					</div>
					<!-- /.modal-content --> 
				 </div>
				<!-- /.modal-dialog --> 	
				</div>

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
