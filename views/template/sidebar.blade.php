<aside class="main-sidebar">
    <section class="sidebar">

        <ul class="sidebar-menu">
            <li class="header">DASHBOARD</li>
            <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
                <a href="{{ action('\skydiver\RapydDashboard\Controllers\DashboardController@getIndex') }}">
                    <i class="fa fa-home"></i>
                    <span>Home</span>
                </a>
            </li>
            @foreach(config('rapyd-dashboard.sidebar') as $label => $menu)
                @include('rapyd-dashboard::template.sidebar_item', ['data' => $menu])
            @endforeach
            <li class="header">EXTRAS</li>
            @foreach(config('rapyd-dashboard.sidebar_extra') as $label => $menu)
                @include('rapyd-dashboard::template.sidebar_item', ['data' => $menu])
            @endforeach
        </ul>
    </section>
</aside>