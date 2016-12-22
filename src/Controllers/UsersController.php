<?php

    namespace Skydiver\RapydDashboard\Controllers;

    use Auth, Config, View;
    use Illuminate\Routing\Controller;
    use Illuminate\Validation\Rule;
    use Skydiver\RapydDashboard\Models\User;
    use Zofe\Rapyd\Facades\DataSet, Zofe\Rapyd\Facades\DataForm, Zofe\Rapyd\Facades\DataFilter;

    class UsersController extends Controller {

        public function index() {

            # GET USERS
            $query = User::orderBy('name', 'ASC');

            # RAPYD/DATAFILTER
            $filter = DataFilter::source($query);
            $filter->attributes(['id' => 'form-filters']);
            $filter->add('name' , 'Name' , 'text');
            $filter->add('email', 'Email', 'text');
            $filter->submit('Filter');
            $filter->reset('Clear');
            $filter->build();

            # RAPYD/DATASET
            $set = DataSet::source($filter)
                ->paginate(25)
                ->getSet();

            # COLS
            $columns = array(
                'name'       => 'Name',
                'email'      => 'Email',
                'updated_at' => 'Last update',
            );

            # TABLE ACTION BUTTONS
            $actions = array(
                'key'    => 'id',
                'new'    => ['url' => action('\Skydiver\RapydDashboard\Controllers\UsersController@form'  )],
                'edit'   => ['url' => action('\Skydiver\RapydDashboard\Controllers\UsersController@form'  )],
                'delete' => true,
            );

            # DISPLAY PAGE
            return View::make('rapyd-dashboard::rapyd.grid', compact('filter', 'set', 'columns', 'actions'))
                ->withTitle('Users')
                ->withTotal($set->totalRows());

        }

        public function form($id=null) {

            # NEW OR UPDATE
            $form = ($id) ? DataForm::source(User::findOrFail($id)) : DataForm::source(new User);

            # PREPARE FORM
            $form->add('name' , 'Name:' , 'text'  )->rule('required');
            $form->add('email', 'Email:', 'text'  )->rule('required|email|'.Rule::unique('users')->ignore($id));
            $form->add('theme', 'Theme:', 'select')->options(Config::get('rapyd-dashboard::AdminLTE.themes'))->rule('required');
            $form->submit('Continue');

            # PROCESS FORM
            $form->saved(function() use ($form) {

                \Session::flash('message', array('type' => 'success', 'msg' => 'User created'));
                return redirect()->action('\Skydiver\RapydDashboard\Controllers\UsersController@index');

            });

            # DISPLAY PAGE
            $form->build();
            return $form->view('rapyd-dashboard::rapyd.form')
                ->withTitle('Add new user');

        }

        public function delete($id) {
            $row = User::findOrFail($id);
            $row->delete();
            \Session::flash('message', array('type' => 'success', 'msg' => 'User deleted'));
            return redirect()->action('\Skydiver\RapydDashboard\Controllers\UsersController@index');
        }

    }

?>