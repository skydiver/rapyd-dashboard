@section('custom_js')
    <script>
        $(document).ready(function() {
            $('.btn-danger').click(function(event) {
                if(confirm('Delete selected record?') == false) { return false; }
            });
        });
    </script>
@stop


@if(isset($actions))
    <td class="grid-actions">

@foreach([
    'edit'   => ['btn' => 'default', 'label' => 'Edit'  , 'icon' => 'fa fa-edit'],
    'delete' => ['btn' => 'danger' , 'label' => 'Delete', 'icon' => 'fa fa-trash-o']
] as $option => $params)
    @if(isset($actions[$option]))
        <a href="{{ isset($actions[$option]['url']) ? $actions[$option]['url'] : '/' . Route::current()->getPath().'/'.$option.'/' }}{{ (isset($actions['key'])) ? $item->{$actions['key']} : '' }}" class="btn btn-xs btn btn-{{ $params['btn'] }}" {!! isset($actions[$option]['extras']) ? $actions[$option]['extras'] : '' !!}><i class="{{ isset($actions[$option]['icon']) ? $actions[$option]['icon'] : $params['icon'] }}"></i>&nbsp;&nbsp;{{ isset($actions[$option]['label']) ? $actions[$option]['label'] : $params['label'] }}</a>
    @endif
@endforeach

@if(isset($actions['extra']))
    @foreach($actions['extra'] as $extra)
        <a href="{{ $extra['url'] }}/{{ (isset($actions['key'])) ? $item->{$actions['key']} : '' }}" class="btn btn-xs btn btn-{{ $extra['btn'] or 'primary' }}"><i class="{{ $extra['icon'] or 'circle' }}"></i>&nbsp;&nbsp;{{ $extra['label'] }}</a>
    @endforeach
@endif

    @if(!isset($actions['edit']) && !isset($actions['delete']) && !isset($actions['extra']))
        <span>&nbsp;</span>
    @endif

    </td>
@endif