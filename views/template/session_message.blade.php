@if(Session::has('message'))
    <div class="alert alert-{{ Session::get('message')['type'] }} alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
    @if(Session::get('message')['type'] == 'success')
        <i class="icon fa fa-check"></i>
    @elseif(Session::get('message')['type'] == 'danger')
        <i class="icon fa fa-ban"></i>
    @elseif(Session::get('message')['type'] == 'warning')
        <i class="icon fa fa-warning"></i>
    @endif
        <strong>{!! Session::get('message')['msg'] !!}</strong>
    @if(isset(Session::get('message')['list']) && is_array(Session::get('message')['list']))
        <ul>
        @foreach(Session::get('message')['list'] as $item)
            <li>{{ $item }}</li>
        @endforeach
        </ul>
    @endif
    </div>
@endif