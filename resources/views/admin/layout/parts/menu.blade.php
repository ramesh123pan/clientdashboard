<ul class="metismenu list-unstyled" id="side-menu">
	<li>
		<a href="{{route('admin.dashboard')}}">
			<i data-feather="home"></i>
			<span data-key="t-dashboard">Dashboard</span>
		</a>
	</li>
	@can('role-list')
	<li>
		<a href="{{route('roles.index')}}">
			<i data-feather="briefcase"></i>
			<span data-key="t-dashboard">Roles & Permissions</span>
		</a>
	</li>
	@endcan
	@can('admin-list')
	<li>
		<a href="{{route('all-admins.index')}}">
			<i data-feather="users"></i>
			<span data-key="t-dashboard">Admins</span>
		</a>
	</li>
	@endcan

	<li>
		<a href="{{route('vendors.index')}}">
			<i data-feather="users"></i>
			<span data-key="t-dashboard">Vendors</span>
		</a>
	</li>
</ul>