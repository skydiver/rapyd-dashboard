@if(isset($filter))
<div class="row">
    <div class="col-md-12">
        <div class="box box box-default{{ ($filter->action == 'search') ? '' : ' collapsed-box' }}">
            <div class="box-header with-border">
                <h3 class="box-title"><i class="fa fa-filter"></i>&nbsp;&nbsp;Filter Records</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                </div>
            </div>
            <div class="box-body"{{ ($filter->action == 'search') ? '' : ' style="display: none;' }}>{!! $filter !!}</div>
        </div>
    </div>
</div>
@endif