<?php

    namespace Skydiver\RapydDashboard\Controllers;

    use View;
    use Illuminate\Routing\Controller;

    class DashboardController extends Controller {

        public function getIndex() {

            return View::make('rapyd-dashboard::home.index');

        }

    }

?>