@extends('rapyd-dashboard::template.master')

@if (config('rapyd-dashboard.logo'))
@section('custom_css')
<style>
    .content-wrapper {
        background-image:url('{{ config('rapyd-dashboard.logo') }}');
        background-position:center;
        background-repeat:no-repeat;
        background-size:50%;
    }
</style>
@endsection
@endif

@section('content')

@endsection