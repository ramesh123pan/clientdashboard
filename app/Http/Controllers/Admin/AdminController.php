<?php

    namespace App\Http\Controllers\Admin;

    use App\Http\Controllers\Controller;
    use Spatie\Permission\Models\Role;
	use Spatie\Permission\Models\Permission;
    use Illuminate\Http\Request;    
    use Illuminate\Support\Str;
    use Illuminate\Support\Arr;
    use App\Models\Admin;
    use DB;
    
    class AdminController extends Controller
    {
        public function __construct()
        {
            $this->middleware('auth:admin');
            $this->middleware('permission:admin-list');
			$this->middleware('permission:admin-create', ['only' => ['create','store']]);
			$this->middleware('permission:admin-edit', ['only' => ['edit','update']]);
			$this->middleware('permission:admin-delete', ['only' => ['destroy']]);
        }
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index(Request $request)
        {
            $data = Admin::orderBy('id','DESC')->paginate(10);
			return view('admin.adminusers.index',compact('data'))->with('i', ($request->input('page', 1) - 1) * 10);
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            $roles = Role::pluck('name','name')->all();
			return view('admin.adminusers.create',compact('roles'));
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
			'first_name' => 'required',
			'last_name' => 'required',
			'email' => 'required|email|unique:users,email',
			'password' => 'required|same:confirm-password',
			'roles' => 'required'
			]);
			$input = $request->all();
			$input['password'] = bcrypt($request['password']);
            if(isset($request['status'])){ 
				$input['status'] = 1;
				}else{
				$input['status'] = 0;
			}
			$user = Admin::create($input);
			$user->assignRole($request->input('roles'));
			return redirect()->back()->with('success','Admin created successfully');
        }

        /**
         * Display the specified resource.
         *
         * @param  \App\Models\Admin  $admin
         * @return \Illuminate\Http\Response
         */
        public function show($id)
        {
            try{
				$user = Admin::find($id);
				return view('admin.adminusers.show',compact('user'));
			}
			catch(\Exception $e){
				return $e->getMessage();
			}
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  \App\Models\Admin  $admin
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
        {
            try{
				$user = Admin::find($id);
				$roles = Role::pluck('name','name')->all();
				$userRole = $user->roles->pluck('name','name')->all();
				return view('admin.adminusers.edit',compact('user','roles','userRole'));
			}
			catch(\Exception $e){
				return redirect()->route('users.index')->with('success','No User Found With this '.$id);
			}
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  \App\Models\Admin  $admin
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, $id)
        {
            $this->validate($request, [
			'first_name' => 'required',
			'last_name' => 'required',
			'email' => 'required|email|unique:admins,email,'.$id,
			'password' => 'same:confirm-password',
			'roles' => 'required'
			]);
			$input = $request->all();
			if(!empty($input['password'])){ 
				$input['password'] = bcrypt($request['password']);
				}else{
				$input = Arr::except($input,array('password'));    
			}
            
            if(isset($request['status'])){ 
				$input['status'] = 1;
				}else{
				$input['status'] = 0;
			}
            
			$user = Admin::find($id);
			$user->update($input);
			
			DB::table('model_has_roles')->where('model_id',$id)->where('model_type','=','App\Models\Admin')->delete();	
			$user->assignRole($request->input('roles'));
			return redirect()->back()->with('success','Admin details updated successfully');
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  \App\Models\Admin  $admin
         * @return \Illuminate\Http\Response
         */
        public function destroy(Admin $admin)
        {
            try{
				$admin=Admin::findorFail($id);
				$admin->delete();
				return redirect()->route('all-admins.index')->with('success','Role deleted successfully');
			}
			catch(\Exception $e){
				return redirect()->route('all-admins.index')->with('error',$e->getMessage());
			}
        }
    }
