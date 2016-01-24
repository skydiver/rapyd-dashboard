@include('rapyd-dashboard::template.session_message')
<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">{{ $title }}</h3>
    </div>
    <form id="rapyd-form" action="?process=1" role="form" method="post" class="form-horizontal">
        {!! $form !!}
    </form>
</div>