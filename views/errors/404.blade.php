@extends('rapyd-dashboard::template.master')


@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="error-page">
                <h2 class="headline text-yellow"> 404</h2>
                <div class="error-content">
                    <h3><i class="fa fa-warning text-yellow"></i> Oops! Page not found.</h3>
                    <p>
                        We could not find the page you were looking for.
                        Meanwhile, you may <a href="{{ action('\Skydiver\RapydDashboard\Controllers\DashboardController@getIndex') }}">return to dashboard</a>.
                    </p>
                </div>
            </div>
        </section>
    </div>
@stop