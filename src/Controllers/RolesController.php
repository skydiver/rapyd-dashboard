<?php

    namespace Skydiver\RapydDashboard\Controllers;

    use Auth, Config, View;
    use Illuminate\Routing\Controller;
    use Skydiver\RapydDashboard\Models\Role;
    use Zofe\Rapyd\Facades\DataSet, Zofe\Rapyd\Facades\DataForm, Zofe\Rapyd\Facades\DataFilter;

    class RolesController extends Controller {

        public function index() {

            # GET USERS
            $query = Role::orderBy('name', 'ASC');

            # RAPYD/DATAFILTER
            $filter = DataFilter::source($query);
            $filter->attributes(['id' => 'form-filters']);
            $filter->add('name'   , 'Name' , 'text');
            $filter->submit('Filter');
            $filter->reset('Clear');
            $filter->build();

            # RAPYD/DATASET
            $set = DataSet::source($filter)
                ->paginate(25)
                ->getSet();

            # COLS
            $columns = array(
                'name'        => 'Name',
                'description' => 'Description',
                'updated_at'  => 'Last update',
            );

            # TABLE ACTION BUTTONS
            $actions = array(
                'key'    => 'id',
                'new'    => ['url' => action('\Skydiver\RapydDashboard\Controllers\RolesController@form')],
                'edit'   => ['url' => action('\Skydiver\RapydDashboard\Controllers\RolesController@form')],
                'delete' => true,
            );

            # DISPLAY PAGE
            return View::make('rapyd-dashboard::rapyd.grid', compact('filter', 'set', 'columns', 'actions'))
                ->withTitle('Roles')
                ->withTotal($set->totalRows());

        }

        public function form($id=null) {

            # NEW OR UPDATE
            $form = ($id) ? DataForm::source(Role::findOrFail($id)) : DataForm::source(new Role);

            # PREPARE FORM
            $form->add('name'       , 'Name:'       , 'text'  )->rule('required');
            $form->add('description', 'Description:', 'text'  )->rule('required');
            $form->submit('Continue');

            # PROCESS FORM
            $form->saved(function() use ($form) {

                \Session::flash('message', array('type' => 'success', 'msg' => 'Role created'));
                return redirect()->action('\Skydiver\RapydDashboard\Controllers\RolesController@index');

            });

            # DISPLAY PAGE
            $form->build();
            return $form->view('rapyd-dashboard::rapyd.form')
                ->withTitle('Create new role');

        }

        public function delete($id) {
            $row = Role::findOrFail($id);
            $row->delete();
            \Session::flash('message', array('type' => 'success', 'msg' => 'Role deleted'));
            return redirect()->action('\Skydiver\RapydDashboard\Controllers\RolesController@index');
        }

    }

?>