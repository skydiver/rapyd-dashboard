@if(Session::has('message'))
    <div class="alert alert-{{ Session::get('message')['type'] }} alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    @if(Session::get('message')['type'] == 'success')
        <i class="icon fa fa-check"></i>
    @endif
        <strong>{!! Session::get('message')['msg'] !!}</strong>
    </div>
@endif