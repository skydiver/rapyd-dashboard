<header class="main-header">
    <a href="{{ route('dashboard-home') }}" class="logo">
        <span class="logo-mini"><i class="fa fa-dashboard"></i></span>
        <span class="logo-lg">{{ config('rapyd-dashboard.title') }}</span>
    </a>
    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ Gravatar::src(Auth::user()->email, 250) }}" class="user-image" alt="{{ Auth::user()->name }}">
                        <span class="hidden-xs">&nbsp;&nbsp;{{ Auth::user()->name }}</span>
                        <span>&nbsp;&nbsp;</span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="user-header">
                            <img src="{{ Gravatar::src(Auth::user()->email, 250) }}" class="img-circle" alt="{{ Auth::user()->name }}">
                            <p>{{ Auth::user()->name }}</p>
                        </li>
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{ action('\Skydiver\RapydDashboard\Controllers\ProfileController@getIndex') }}" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="{{ route('dashboard-logout') }}" class="btn btn-default btn-flat">Logout</a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>