@extends('rapyd-dashboard::template.master')


@section('content')

    @include('rapyd-dashboard::rapyd.form_help')

    <div class="row">
        <div class="col-md-12">
            @include('rapyd-dashboard::rapyd.form_raw')
        </div>
    </div>

@endsection