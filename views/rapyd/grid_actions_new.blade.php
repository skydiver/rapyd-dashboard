@if(isset($actions))
    <th class="grid-actions">

    @if(isset($actions['new']))
        <a href="{{ $actions['new']['url'] }}" class="btn btn-xs btn btn-{{ $actions['new']['btn'] or 'primary' }}"><i class="fa fa-pencil"></i>&nbsp;&nbsp;{{ isset($actions['new']['label']) ? $actions['new']['label'] : 'New' }}</a>
    @endif

    @if(isset($actions['top']))
        @foreach($actions['top'] as $extra)
            <a {!! isset($extra['url']) ? 'href="'.$extra['url'].'"' : '' !!} class="btn btn-xs btn btn-{{ $extra['btn'] or 'primary' }} {{ $extra['class'] or ''}}"><i class="icon-{{ $extra['icon'] or 'circle' }}"></i>&nbsp;&nbsp;{{ $extra['label'] }}</a>
        @endforeach
    @endif

    @if(isset($actions['top_group']))
        <span class="dropdown">
            <button type="button" class="btn btn-xs btn-primary dropdown-toggle" data-toggle="dropdown">&nbsp;&nbsp;Actions&nbsp;&nbsp;<span class="caret"></span>&nbsp;</button>
            <ul class="dropdown-menu dropdown-menu-right" role="menu">
            @foreach($actions['top_group'] as $extra)
                <li><a href="{{ $extra['url'] }}" class="{{ $extra['class'] or ''}}">{{ $extra['label'] }}</a></li>
            @endforeach
            </ul>
        </span>
    @endif

    @if(!isset($actions['new']) && !isset($actions['top']) && !isset($actions['top_group']))
        <span>&nbsp;</span>
    @endif

    </th>
@endif