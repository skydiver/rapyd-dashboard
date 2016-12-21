@extends('rapyd-dashboard::template.login')

@section('custom_css')
    <link href="{{ asset('packages/skydiver/rapyd-dashboard/app/css/ssologin.css') }}" rel="stylesheet">
@stop


@section('content')

    @include('rapyd-dashboard::template.session_message')

    <div class="google">
        <a href="{{ action('\Skydiver\RapydDashboard\Controllers\AuthController@redirectToGoogle') }}"></a>
    </div>

@stop