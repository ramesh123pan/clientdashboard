@extends('admin.layout.app')
@section('page_title', 'Vendors')
@section('css')
<!-- DataTables -->
	<link href="{{asset('vxtheme/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('vxtheme/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
	<!-- Responsive datatable examples -->
	<link href="{{asset('vxtheme/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" /> 	
@endsection
@section('page_header')   
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Vendors</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Vendors</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
<div class="row mt-3">
	<div class="col-lg-12">
		<div class="card">
			<div class="card-header">
				<b>All Vendors</b>
				<a class="btn btn-success btn-sm float-end" href="{{ route('vendors.create') }}"><i class="fa fa-plus"></i> Create New Vendor</a>
				<!-- @can('vendor-create') -->
				<!-- @endcan -->
			</div>
			<div class="card-body">
				@include('my-flash')
				<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
					<thead>
						<tr>
							<th>No</th>
							<th>Name</th>
							<th width="280px">Action</th>
						</tr>
					</thead>
					<tbody>

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