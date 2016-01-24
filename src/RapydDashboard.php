<?php

    namespace Skydiver\RapydDashboard;

    use Illuminate\Support\Facades\Facade;

    class RapydDashboard extends Facade {

        protected static function getFacadeAccessor() { return 'rapyd-dashboard'; }

    }

?>