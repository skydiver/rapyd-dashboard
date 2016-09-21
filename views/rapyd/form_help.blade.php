@if(isset($help))
    <div class="row">
        <div class="col-md-12">
            <div class="box box box-warning collapsed-box">
                <div class="box-header with-border">
                    <h3 class="box-title"><i class="fa fa-question-circle"></i>&nbsp;&nbsp;Help</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
                <div class="box-body">{!! $help !!}</div>
            </div>
        </div>
    </div>
@endif