@extends('layouts.admin.master')



@section('content')
	<body class="">
    <div class="wrapper">
       @include('layouts.admin.sidenav')
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent  navbar-absolute fixed-top">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <span class="navbar-brand">Manage User Data</span>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <form class="navbar-form">
                            <div class="input-group no-border">
                                <input type="text" value="" class="form-control" placeholder="Search...">
                                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                    <i class="material-icons">search</i>
                                    <div class="ripple-container"></div>
                                </button>
                            </div>
                        </form>
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#pablo">
                                    <i class="material-icons">dashboard</i>
                                    <p>
                                        <span class="d-lg-none d-md-block">Stats</span>
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">notifications</i>
                                    <span class="notification">5</span>
                                    <p>
                                        <span class="d-lg-none d-md-block">Some Actions</span>
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="#">Mike John responded to your email</a>
                                    <a class="dropdown-item" href="#">You have 5 new tasks</a>
                                    <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                                    <a class="dropdown-item" href="#">Another Notification</a>
                                    <a class="dropdown-item" href="#">Another One</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#pablo">
                                    <i class="material-icons">person</i>
                                    <p>
                                        <span class="d-lg-none d-md-block">Account</span>
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">
   


                <div class="container-fluid">

                    <div class="row">
                        <div class="col-md-6">
                           <div class="row">
                               <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header card-header-success">
                                            <h4 class="card-title">{{ $user->username }}</h4>
                                            <p class="card-category">Registered: {{ $user->created_at->diffForHumans(null, false, true) }}</p>
                                        </div>
                                        <div class="card-body">
                                            <form action="{{ route('admin.user.update', $user->id) }}" method="post">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="type" value="1">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="bmd-label-floating">User Email</label>
                                                            <input type="text" class="form-control" disabled value="{{ $user->email}}">
                                                        </div>
                                                    </div>

                                                     <div class="col-md-6">
                                                        <div class="form-group {{ $errors->has('username') ? ' has-danger' : '' }}">
                                                            <label class="bmd-label-floating">Username</label>
                                                            <input type="text" name="username" class="form-control" value="{{ $user->username}}">
                                                            @if ($errors->has('username'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('username') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <button class="btn btn-success float-right" type="submit">Update</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                               </div>

                               <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header card-header-success">
                                            <h4 class="card-title">Passwords</h4>
                                            <p class="card-category">You can manage user passwords or force a password change here</p>
                                        </div>
                                        <div class="card-body">
                                            <form action="{{ route('admin.user.update', $user->id) }}" method="post">
                                                {{ csrf_field() }}
                                                <input type="hidden" name="type" value="2">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="bmd-label-floating">New Password</label>
                                                            <input type="password" class="form-control" name="password">
                                                            @if ($errors->has('password'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('password') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                     <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="bmd-label-floating">Confirm Password</label>
                                                            <input type="password" name="password_confirmation" class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <button class="btn btn-success float-right" type="submit">Update</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                               </div>
                           </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4>here</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                  
                </div>
            </div>
            @include('layouts.admin.footer')
        </div>
    </div>
</body>
@endsection