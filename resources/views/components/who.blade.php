@if (Auth::guard('web')->check())
	<strong>User</strong>
@else
	<strong>Not logged in</strong>
@endif


@if (Auth::guard('admin')->check())
	<strong>Admin</strong>
@else
	<strong>Not logged in</strong>
@endif

