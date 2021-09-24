<?php

    namespace App\Http\Controllers\Admin;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use Spatie\Permission\Models\Vendor;
	use Spatie\Permission\Models\Permission;
	use DB;
	use App\Models\Admins;

    class VendorController extends Controller
    {
   //      public function __construct()
   //      {
   //          $this->middleware('auth:admin');
   //          $this->middleware('permission:vendor-list');
			// $this->middleware('permission:vendor-create', ['only' => ['create','store']]);
			// $this->middleware('permission:vendor-edit', ['only' => ['edit','update']]);
			// $this->middleware('permission:vendor-delete', ['only' => ['destroy']]);
   //      }
    	public function __construct()
        {
             $this->middleware('auth:admin');
			//$this->middleware('permission:vendor-create', ['only' => ['create','store']]);
         }
        
        /**
			* Display a listing of the resource.
			*
			* @return \Illuminate\Http\Response
		*/
		public function index(Request $request)
		{			
			//$vendors = Vendor::orderBy('name','ASC')->paginate(10);
			//return view('admin.vendors.index',compact('vendors'))
			return view('admin.vendors.index')
            ->with('i', ($request->input('page', 1) - 1) * 10);
		}
		
		
		/**
			* Show the form for creating a new resource.
			*
			* @return \Illuminate\Http\Response
		*/
		public function create()
		{
			//$permission = Permission::get();
			return view('admin.vendors.create');
			//return view('admin.vendors.create');
		}
		
		
		/**
			* Store a newly created resource in storage.
			*
			* @param  \Illuminate\Http\Request  $request
			* @return \Illuminate\Http\Response
		*/
		public function store(Request $request)
		{
			$this->validate($request, [
            'name' => 'required|unique:vendors,name',
            'permission' => 'required',
			]);
			
			
			//$vendor = Vendor::create(['name' => $request->input('name')]);
			//$vendor->syncPermissions($request->input('permission'));
			
			
			return redirect()->route('vendors.index')
			->with('success','Vendor created successfully');
		}
		/**
			* Display the specified resource.
			*
			* @param  int  $id
			* @return \Illuminate\Http\Response
		*/
		public function show($id)
		{
			$vendor = Vendor::find($id);
			$vendorPermissions = Permission::join("vendor_has_permissions","vendor_has_permissions.permission_id","=","permissions.id")
			->where("vendor_has_permissions.vendor_id",$id)
			->get();
			
			
			return view('admin.vendors.show',compact('vendor','vendorPermissions'));
		}
		
		
		/**
			* Show the form for editing the specified resource.
			*
			* @param  int  $id
			* @return \Illuminate\Http\Response
		*/
		public function edit($id)
		{
			$vendor = Vendor::find($id);
			$permission = Permission::get();
			$vendorPermissions = DB::table("vendor_has_permissions")->where("vendor_has_permissions.vendor_id",$id)
			->pluck('vendor_has_permissions.permission_id','vendor_has_permissions.permission_id')
			->all();
			
			
			return view('admin.vendors.edit',compact('vendor','permission','vendorPermissions'));
		}
		
		
		/**
			* Update the specified resource in storage.
			*
			* @param  \Illuminate\Http\Request  $request
			* @param  int  $id
			* @return \Illuminate\Http\Response
		*/
		public function update(Request $request, $id)
		{
			$this->validate($request, [
			'name' => 'required',
			'permission' => 'required',
			]);						
			$vendor = Vendor::find($id);
			$vendor->name = $request->input('name');
			$vendor->save();						
			$vendor->syncPermissions($request->input('permission'));						
			return redirect()->back()->with('success','Vendor updated successfully');
		}
		/**
			* Remove the specified resource from storage.
			*
			* @param  int  $id
			* @return \Illuminate\Http\Response
		*/
		public function destroy($id)
		{
			DB::table("vendors")->where('id',$id)->delete();
			return redirect()->route('vendors.index')
			->with('success','Vendor deleted successfully');
		}
    }
