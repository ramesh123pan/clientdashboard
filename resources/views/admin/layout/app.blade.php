<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8" />
		<title>{{ config('app.name', 'Laravel') }} | @yield('page_title')</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta content="" name="description" />
		<meta content="" name="author" />
		<!-- App favicon -->
		<link rel="shortcut icon" href="{{asset('vxtheme/assets/images/favicon.ico')}}" />
		@include('admin.layout.csslist')
	</head>
	<body>
		<div id="layout-wrapper">
			<header id="page-topbar">
				<div class="navbar-header">
					<div class="d-flex">
						<div class="navbar-brand-box">
							<a href="{{route('admin.dashboard')}}" class="logo logo-dark">
								<span class="logo-sm">
									<img src="{{asset('vxtheme/assets/images/logo-sm.svg')}}" alt="" height="24" />
								</span>
								<span class="logo-lg">
									<img src="{{asset('vxtheme/assets/images/logo-sm.svg')}}" alt="" height="24" /> <span class="logo-txt">{{ config('app.name', 'Laravel') }}</span>
								</span>
							</a>
							<a href="{{route('admin.dashboard')}}" class="logo logo-light">
								<span class="logo-sm">
									<img src="{{asset('vxtheme/assets/images/logo-sm.svg')}}" alt="" height="24" />
								</span>
								<span class="logo-lg">
									<img src="{{asset('vxtheme/assets/images/logo-sm.svg')}}" alt="" height="24" /> <span class="logo-txt">{{ config('app.name', 'Laravel') }}</span>
								</span>
							</a>
						</div>
						<button type="button" class="btn btn-sm px-3 font-size-16 header-item" id="vertical-menu-btn">
							<i class="fa fa-fw fa-bars"></i>
						</button>						
					</div>
					<div class="d-flex">
						<div class="dropdown d-inline-block">
							<button type="button" class="btn header-item noti-icon position-relative" id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i data-feather="bell" class="icon-lg"></i>
								<span class="badge bg-danger rounded-pill">5</span>
							</button>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-notifications-dropdown">
								<div class="p-3">
									<div class="row align-items-center">
										<div class="col">
											<h6 class="m-0"> Notifications </h6>
										</div>
										<div class="col-auto">
											<a href="#!" class="small text-reset text-decoration-underline"> Unread (3)</a>
										</div>
									</div>
								</div>
								<div data-simplebar style="max-height: 230px;">
									<a href="#!" class="text-reset notification-item">
										<div class="d-flex">
											<div class="flex-shrink-0 me-3">
												<img src="{{asset('vxtheme/assets/images/users/avatar-3.jpg')}}" class="rounded-circle avatar-sm" alt="user-pic" />
											</div>
											<div class="flex-grow-1">
												<h6 class="mb-1">James Lemire</h6>
												<div class="font-size-13 text-muted">
													<p class="mb-1">It will seem like simplified English.</p>
													<p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>1 hours ago</span></p>
												</div>
											</div>
										</div>
									</a>

								</div>
								<div class="p-2 border-top d-grid">
									<a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
										<i class="mdi mdi-arrow-right-circle me-1"></i> <span>View More..</span> 
									</a>
								</div>
							</div>
						</div>
						<div class="dropdown d-inline-block">
							<button type="button" class="btn header-item bg-soft-light border-start border-end" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<img class="rounded-circle header-profile-user" src="{{asset('vxtheme/assets/images/users/avatar-1.jpg')}}" alt="Header Avatar" />
								<span class="d-none d-xl-inline-block ms-1 fw-medium">{{ Auth::user()->first_name }}</span>
								<i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
							</button>
							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="#"><i class="mdi mdi-face-profile font-size-16 align-middle me-1"></i> Profile</a>
								<div class="dropdown-divider"></div>								
								<a class="dropdown-item" href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
									<i class="mdi mdi-logout font-size-16 align-middle me-1"></i> {{ __('Logout') }}
								</a>
								<form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
									@csrf
								</form>
							</div>
						</div>
					</div>
				</div>
			</header>
			<div class="vertical-menu">
				<div data-simplebar class="h-100">
					<div id="sidebar-menu">
						<!-- Left Menu Start -->
						@include('admin.layout.part.menu')
						<!-- Sidebar -->
					</div>
				</div>				
			</div>				
			<div class="main-content">
				<div class="page-content">
					<div class="container-fluid">						
					@yield('page_header')
					@yield('content')
					@include('admin.layout.part.footer')
					</div> 
				</div>			
			</div>
		</div>
		@include('admin.layout.part.setting-bar')
		<div class="rightbar-overlay"></div>
		<!-- JAVASCRIPT -->		
		@include('admin.layout.jslist')
	</body>
</html>