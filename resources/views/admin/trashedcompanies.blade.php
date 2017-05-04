@extends('layouts.admin')

<style>
	.span3{
		display: inline-block;

	}
</style>

<link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/plug-ins/3cfcc339e89/integration/bootstrap/3/dataTables.bootstrap.css">



@section('content')

<div class="container">
	<div class="row">
		<h2 class="text-left">trashed companies</h2>
	</div>
    
        <div class="row">
		
            <div class="col-md-12">
            
            
<table id="data-table"  class="table table-bordered table-hover" style="border: 2px solid #000;">
    				<thead>
						<tr>
						   <th>#</th>
							<th>Name</th>
							<th>email</th>
							<th>phone</th>
							<th>city</th>
							<th>rating</th>
							
                           <th>restore</th>
                             
						</tr>
					</thead>
			   <tbody>
				@foreach($companies as $company)

					<tr>
						<td>{{$company->id}}</td>
						<td>{{$company->name}}</td>
						<td>{{$company->email}}</td>
						<td>{{$company->phone}}</td>
						<td>{{$company->city}}</td>
						<td>  
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

							<p  data-placement="top" data-toggle="tooltip" title="restore">

							<a  href="{{url('ad/trashedcompanies')}}/{{$company->id}}/{{'restore'}}" class="btn btn-primary btn-xs"   data-title="restore">
							<span class="glyphicon glyphicon-check">
								
							</span>
							</a>
							</p>
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
