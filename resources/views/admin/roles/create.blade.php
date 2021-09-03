@extends('admin.layout.app')
@section('page_title', 'Role Create')
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
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Roles</a></li>
                        <li class="breadcrumb-item active">Create</li>
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
			<div class="card-header">Add Role
				<a class="btn btn-primary pull-right" href="{{ route('roles.index') }}"> Back</a>
			</div>
			<div class="card-body">
				@include('my-flash')
				{!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group">
							<strong>Name:</strong>
							{!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12">
						<div class="form-group">
							<strong>Permission:</strong>
							<br/>
							<div class="row">
							@foreach($permission as $value)
							<div class="col-md-3">
								<label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
								{{ $value->name }}</label>
							</div>
							@endforeach
							</div>
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