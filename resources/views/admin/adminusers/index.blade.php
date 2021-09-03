@extends('admin.layout.app')
@section('page_title', 'All Admin Users')
@section('css')
	<!-- DataTables -->
	<link href="{{asset('vxtheme/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('vxtheme/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
	<!-- Responsive datatable examples -->
	<link href="{{asset('vxtheme/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" /> 	
@endsection
@section('content')
<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">All Admin Users
				@can('admin-create')
				<a class="btn btn-success btn-sm pull-right" href="{{ route('all-admins.create') }}"><i class="fa fa-plus"></i> Add User</a>
				@endcan
			</div>
			<div class="card-body">
				@include('my-flash')
				<table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
					<thead>
						<tr>
							<th>Name</th>
							<th>Email</th>
							<th>Roles</th>
							<th>Created Date</th>
							<th width="280px">Action</th>
						</tr>
					</thead>
					<tbody>				
						@foreach ($data as $key => $user)
						<tr>		
							<td>{{ $user->first_name }} {{ $user->last_name }}</td>
							<td>{{ $user->email }}</td>
							<td>
								@if(!empty($user->getRoleNames()))
								@foreach($user->getRoleNames() as $v)
								<label class="badge bg-success">{{ $v }}</label>
								@endforeach
								@endif
							</td>
							<td>{{ $user->created_at }}</td>
							<td>
								<a class="" href="{{ route('all-admins.show',$user->id) }}"><i class="fa fa-eye"></i></a>&nbsp;&nbsp;&nbsp;
								@can('admin-edit')
								<a class="" href="{{ route('all-admins.edit',$user->id) }}"><i class="fa fa-edit"></i></a>
								@endcan
								@can('admin-delete')
								{!! Form::open(['method' => 'DELETE','route' => ['all-admins.destroy', $user->id],'style'=>'display:inline','onsubmit' => 'return confirm("Do you want to delete this user?")']) !!}
								{{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'tpbtn text-danger'] )  }}
								{!! Form::close() !!}
								@endcan
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection						
@section('js')
<!-- Required datatable js -->
<script src="{{asset('vxtheme/assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vxtheme/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<!-- Buttons examples -->
<script src="{{asset('vxtheme/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('vxtheme/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('vxtheme/assets/libs/jszip/jszip.min.js')}}"></script>
<script src="{{asset('vxtheme/assets/libs/pdfmake/build/pdfmake.min.js')}}"></script>
<script src="{{asset('vxtheme/assets/libs/pdfmake/build/vfs_fonts.js')}}"></script>
<script src="{{asset('vxtheme/assets/libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('vxtheme/assets/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('vxtheme/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>

<!-- Responsive examples -->
<script src="{{asset('vxtheme/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('vxtheme/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>

<!-- Datatable init js -->
<script src="{{asset('vxtheme/assets/js/pages/datatables.init.js')}}"></script>
@endsection	