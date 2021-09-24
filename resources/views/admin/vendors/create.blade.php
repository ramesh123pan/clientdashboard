@extends('admin.layout.app')
@section('page_title', 'Vendor Create')
@section('css')
@endsection
@section('page_header')   
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Vendors</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Vendors</a></li>
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
			<div class="card-header"><b>Add Vendor</b>
				<a class="btn btn-primary float-end" href="{{ route('vendors.index') }}"> Back</a>
			</div>
			<div class="card-body">
				
				<div class="row">
					<div class="col-sm-6">
						<h3>Personal Information</h3>
						<hr/>
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-6">
								<div class="form-group required">
									<label>First Name</label>
									<input type="text" name="first_name" class="form-control" value="" placeholder="First Name" required />						
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6">
								<div class="form-group">
									<label>Last Name</label>
									<input type="text" name="last_name" class="form-control" value="" placeholder="Last Name" />
								</div>
							</div>
						</div>
						<div class="row mt-4">
							<div class="col-xs-12 col-sm-12 col-md-6">
								<div class="form-group required">
									<label>Mobile No.</label>
									<input type="text" name="phone" class="form-control" value="" placeholder="Mobile No." required />						
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6">
								<div class="form-group required">
									<label>Email Id</label>
									<input type="email" name="email" class="form-control" value="" required placeholder="Email Id" />
								</div>
							</div>
						</div>

						<div class="row mt-4">
							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="form-group">
									<label>Address</label>
									<textarea name="address" cols="4" rows="4" placeholder="Address" class="form-control"></textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<h3>Business Information</h3>
						<hr/>
						<div class="row">
							<div class="col-xs-12 col-sm-12 col-md-6">
								<div class="form-group required">
									<label>Company Name</label>
									<input type="text" name="company_name" class="form-control" value="" placeholder="Company Name" required />						
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6">
								<div class="form-group required">
									<label>Mobile No.</label>
									<input type="text" name="company_phone" class="form-control" value="" placeholder="Mobile No." required />						
								</div>
							</div>
						</div>
						<div class="row mt-4">
							<div class="col-xs-12 col-sm-12 col-md-6">
								<div class="form-group required">
									<label>Business Email Id</label>
									<input type="email" name="business_email" class="form-control" value="" required placeholder="Business Email Id" />
								</div>
							</div>
							<div class="col-xs-12 col-sm-12 col-md-6">
								<div class="form-group">
									<label>Website</label>
									<input type="text" name="website" class="form-control" value="" placeholder="Website" />			
								</div>	
							</div>
						</div>
						<div class="row mt-4">
							<div class="col-xs-12 col-sm-12 col-md-12">
								<div class="form-group">
									<label>Business Address</label>
									<textarea name="business_address" cols="4" rows="4" placeholder="Business Address" class="form-control"></textarea>
								</div>
							</div>
						</div>
					</div>
					<div class="col-xs-12 col-sm-12 col-md-12 text-center mt-5">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>	
@endsection		
@section('js')
@endsection		