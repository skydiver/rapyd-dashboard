@extends('rapyd-dashboard::template.login')

@section('custom_css')
    <link href="{{ asset('packages/skydiver/rapyd-dashboard/app/css/ssologin.css') }}" rel="stylesheet">
@endsection


@section('messages')
    @include('rapyd-dashboard::template.session_message')
@endsection

@section('content')
    <div class="google">
        <a href="{{ action('\Skydiver\RapydDashboard\Controllers\AuthController@redirectToGoogle') }}"></a>
    </div>
@endsection