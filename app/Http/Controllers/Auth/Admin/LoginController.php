<?php

    namespace App\Http\Controllers\Auth\Admin;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\Providers\RouteServiceProvider;
    use Illuminate\Foundation\Auth\AuthenticatesUsers;
    use Auth;
	use Route;

    class LoginController extends Controller
    {
        use AuthenticatesUsers;
        
        protected $redirectTo = RouteServiceProvider::ADMIN;
        
        public function __construct()
        {
            $this->middleware('guest:admin', ['except' => ['logout']]);
        }
        
        public function showLoginForm()
		{
			return view('auth.admin.login');
		}
        
        public function login(Request $request)
		{			
			// Validate the form data
			$this->validate($request, [
                'email'   => 'required|email',
                'password' => 'required|min:8'
			]);
			// return $request->remember;
			// Attempt to log the user in
			if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
				if( Auth::guard('admin')->user()->status==0)
				{
					Auth::guard('admin')->logout();
					return redirect()->back()->with('erro_login', 'Your Account is not active');
				}
				return redirect()->route('admin.dashboard');
			} 
			
			// if unsuccessful, then redirect back to the login with the form data
			return redirect()->back()->withInput($request->only('email', 'remember'));
		}
		
		public function logout()
		{
			Auth::guard('admin')->logout();
			return redirect('/admin/login');
		}
    }
