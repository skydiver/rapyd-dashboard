<?php

    # SET LI CLASSES (STATUS & DROPDOWN)
    $li_class  = (isset($data['active']) && Request::is($data['active'])) ? 'active' : '';
    $li_class .= (isset($data['items'])) ? ' treeview' : '';

    # GET URL PARAMETERS
    $action = (isset($data['action']) ? $data['action'] : '');
    $params = (isset($data['params']) ? $data['params'] : '');

    # SET BUTTON URL
    if($action != '' && $params != '') {
        $URL = action($action, $params);
    } elseif($action != '' && $params == '') {
        $URL = action($action);
    } else {
        $URL = '#';
    }

?>

<li class="{{ $li_class }}">
    <a href="{{ $URL }}">
        <i class="fa {{ $data['icon'] }}"></i>
        <span>{{ $label }}</span>
    @if(isset($data['items']))
        <i class="fa fa-angle-left pull-right"></i>
    @endif
    </a>
@if(isset($data['items']))
    <ul class="treeview-menu">
    @foreach($data['items'] as $label => $action)
        <li{!! (action($action) == Request::url() ? ' class="active"' : '') !!}>
            <a href="{{ action($action) }}"><i class="fa fa-circle-o"></i> {{ $label }}</a>
        </li>
    @endforeach
    </ul>
@endif
</li>