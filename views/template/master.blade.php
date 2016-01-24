<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Dashboard</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('packages/skydiver/rapyd-dashboard/assets/bootstrap/css/bootstrap.min.css')   }}">
    <link rel="stylesheet" href="{{ asset('packages/skydiver/rapyd-dashboard/assets/dist/css/AdminLTE.min.css')         }}">
    <link rel="stylesheet" href="{{ asset('packages/skydiver/rapyd-dashboard/assets/dist/css/skins/_all-skins.min.css') }}">
    <link rel="stylesheet" href="{{ asset('packages/skydiver/rapyd-dashboard/app/css/admin.css') }}">
    {!! Rapyd::styles() !!}
    @yield('custom_css')
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="hold-transition {{ (Auth::user()->theme != '') ? Auth::user()->theme : 'skin-blue' }} sidebar-mini">
    <div class="wrapper">

        @include('rapyd-dashboard::template.header')
        @include('rapyd-dashboard::template.sidebar')

        <div class="content-wrapper">
            <section class="content">
                @yield('content')
            </section>
        </div>

    </div>

    <script src="{{ asset('packages/skydiver/rapyd-dashboard/assets/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('packages/skydiver/rapyd-dashboard/assets/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('packages/skydiver/rapyd-dashboard/assets/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('packages/skydiver/rapyd-dashboard/assets/plugins/fastclick/fastclick.js') }}"></script>
    <script src="{{ asset('packages/skydiver/rapyd-dashboard/assets/dist/js/app.min.js') }}"></script>
    @yield('custom_js')
    {!! Rapyd::scripts() !!}

</body>
</html>