@extends('admin.layout.app')
@section('page_title', 'Admin User Create')
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
                        <li class="breadcrumb-item active">Create</li>
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
			<div class="card-header">Add User</div>
			<div class="card-body">
				@include('my-flash')
				{!! Form::open(array('route' => 'all-admins.store','method'=>'POST')) !!}
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6 mb-3">
						<div class="form-group">
							<strong>First Name:</strong>
							{!! Form::text('firstname', null, array('placeholder' => 'First Name','class' => 'form-control')) !!}
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6 mb-3">
						<div class="form-group">
							<strong>Last Name:</strong>
							{!! Form::text('lastname', null, array('placeholder' => 'Last Name','class' => 'form-control')) !!}
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6 mb-3">
						<div class="form-group">
							<strong>Email:</strong>
							{!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6 mb-3">
						<div class="form-group">
							<strong>Password:</strong>
							{!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control','autocomplete' => 'new-password')) !!}
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6 mb-3">
						<div class="form-group">
							<strong>Confirm Password:</strong>
							{!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6 mb-3">
						<div class="form-group">
							<strong>Role:</strong>
							{!! Form::select('roles[]', $roles,[], array('class' => 'form-control')) !!}
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6 mb-3">
						<div class="form-group">
							<label for="status1"><strong>Status:</strong>
							<input type="checkbox" name="status" id="status1" value="1" />
							</label>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12 text-center">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</div>
				{!! Form::close() !!}					
			</div>
		</div>
	</div>
</div>
@endsection						
@section('js')	
@endsection	