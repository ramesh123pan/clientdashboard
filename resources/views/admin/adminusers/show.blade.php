@extends('admin.layout.app')
@section('page_title', 'Admin User Show')
@section('css')
@endsection
@section('page_header')   
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">All Admin Users</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Admin Users</a></li>
                        <li class="breadcrumb-item active">Show</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
<div class="row mt-3">
	<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
		<div class="card">
			<div class="card-header">Admin Details</div>
			<div class="card-body">
				@include('my-flash')
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group">
							<strong>First Name:</strong>
							{{ $user->first_name }}
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group">
							<strong>Last Name:</strong>
							{{ $user->last_name }}
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group">
							<strong>Email:</strong>
							{{ $user->email }}
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group">
							<strong>Roles:</strong>
							@if(!empty($user->getRoleNames()))
							@foreach($user->getRoleNames() as $v)
							<label class="badge bg-success">{{ $v }}</label>
							@endforeach
							@endif
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group">
							<strong>Status:</strong>
							@if($user->status)
								<label class="badge bg-success">Active</label>
							@else
								<label class="badge bg-success">InActive</label>
							@endif
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection			
@section('js')	
@endsection				