<?php

    namespace Skydiver\RapydDashboard\Controllers;

    use Auth, Config, View;
    use Illuminate\Routing\Controller;
    use Skydiver\RapydDashboard\Models\UserLog;
    use Zofe\Rapyd\Facades\DataSet, Zofe\Rapyd\Facades\DataFilter;

    class UsersLogsController extends Controller {

        public function index() {

            # GET USERS
            $query = UserLog::orderBy('updated_at', 'DESC');

            # RAPYD/DATAFILTER
            $filter = DataFilter::source($query);
            $filter->attributes(['id' => 'form-filters']);
            $filter->add('email' , 'Email', 'text');
            $filter->add('ip'    , 'IP'   , 'text');
            $filter->add('result', 'Role' , 'select')->options(['' => '(Status)'] + UserLog::orderBy('updated_at', 'DESC')->groupBy('result')->get()->pluck('result', 'result')->toArray());
            $filter->submit('Filter');
            $filter->reset('Clear');
            $filter->build();

            # RAPYD/DATASET
            $set = DataSet::source($filter)
                ->paginate(25)
                ->getSet();

            # COLS
            $columns = array(
                'email'      => 'Email',
                'ip'         => 'IP',
                'result'     => 'Result',
                'updated_at' => 'Last update',
            );

            # DISPLAY PAGE
            return View::make('rapyd-dashboard::rapyd.grid', compact('filter', 'set', 'columns'))
                ->withTitle('Users Logs')
                ->withTotal($set->totalRows());

        }

    }

?>