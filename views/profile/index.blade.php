@extends('rapyd-dashboard::template.master')


@section('content')

    <div class="row">
        <div class="col-md-6">
            @include('rapyd-dashboard::rapyd.form_raw')
        </div>
        <div class="col-md-6">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Your last 5 logins</h3>
                </div>
                <div class="box-body no-padding">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Time</th>
                                <th>IP</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($logins as $login)
                            <tr>
                                <td>{{ $login->updated_at->format('Y-m-d') }}</td>
                                <td>{{ $login->updated_at->format('H:i:s') }}</td>
                                <td>{{ $login->ip }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection