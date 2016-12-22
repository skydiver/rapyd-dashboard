@extends('rapyd-dashboard::template.master')

@if(isset($javascript))
    @section('custom_js')
        {!! $javascript !!}
    @stop
@endif


@section('content')

    @include('rapyd-dashboard::rapyd.filterbar')
    @include('rapyd-dashboard::template.session_message')

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">

                <div class="box-header">
                    <h3 class="box-title"><i class="fa fa-th-list"></i>&nbsp;&nbsp;{{ (isset($title)) ? $title : 'Records' }}</h3>
                    <span class="label label-primary pull-right">Total: {{ $total }}</span>
                </div>

                <div class="box-body no-padding">
                    <table class="table table-bordered data-table">
                        <thead>
                            <tr>
                            @foreach($columns as $column)
                                <th>{!! $column !!}</th>
                            @endforeach
                            @include('rapyd-dashboard::rapyd.grid_actions_new')
                            </tr>
                        </thead>
                        <tbody>
                    @if(count($set->data) > 0)
                        @foreach($set->data as $item)
                            <tr>
                            @foreach($columns as $field => $column)
                                <td>{!! (isset($custom_fields) && isset($custom_fields[$field])) ? str_replace('|field|', $item->{$field}, $custom_fields[$field]) : $item->{$field} !!}</td>
                            @endforeach
                            @include('rapyd-dashboard::rapyd.grid_actions_edit_delete')
                            </tr>
                        @endforeach
                    @else
                            <tr>
                                <td class="empty" colspan="{{ count($columns)+1 }}">No records</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>

            @if($set->data->total() >= $set->data->perPage())
                <div class="box-footer clearfix footer-pagination">
                    {!! $set->links('rapyd-dashboard::template.paginator') !!}
                </div>
            @endif

            </div>
        </div>
    </div>

    @if(isset($actions['delete']))
        @include('rapyd-dashboard::rapyd.dialog_delete')
    @endif

@stop