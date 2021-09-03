@extends('admin.layout.app')
@section('page_title', 'View Role')
@section('css')
@endsection
@section('page_header')   
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Roles</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Role</a></li>
                        <li class="breadcrumb-item active">View</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
<div class="row mt-3">
	<div class="col-12">
		<div class="card">
			<div class="card-header">View Role
				<a class="btn btn-primary pull-right" href="{{ route('roles.index') }}"> Back</a>
			</div>
			<div class="card-body">
				@include('my-flash')
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group">
							<strong>Name:</strong>
							{{ $role->name }}
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group">
							<strong>Permissions:</strong>
							@if(!empty($rolePermissions))
							@foreach($rolePermissions as $v)
							<label class="label label-success">{{ $v->name }},</label>
							@endforeach
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