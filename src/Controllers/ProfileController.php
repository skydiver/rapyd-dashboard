<?php

    namespace Skydiver\RapydDashboard\Controllers;

    use Auth, Config, View;
    use Illuminate\Routing\Controller;
    use Skydiver\RapydDashboard\Models\UserLog, Skydiver\RapydDashboard\Models\User;

    class ProfileController extends Controller {

        public function getIndex() {

            $form = \DataForm::source(User::find(Auth::user()->id));

            $form->add('name'  , 'Name'  , 'text'  )->rule('required|min:5');
            $form->add('email' , 'E-mail', 'text'  )->rule('required|email');
            $form->add('theme' , 'Theme' , 'select')->options(Config::get('rapyd-dashboard::AdminLTE.themes'))->rule('required');
            $form->add('avatar', 'Avatar', 'select')->options(array_combine(Config::get('rapyd-dashboard::AdminLTE.avatar'), Config::get('rapyd-dashboard::AdminLTE.avatar')))->rule('required');
            $form->submit('Update Profile');

            $form->saved(function () use ($form) {

                \Session::flash('message', array('type' => 'success', 'msg' => 'Profile updated'));
                return redirect()->action('\Skydiver\RapydDashboard\Controllers\ProfileController@getIndex');

            });

            $form->build();

            # GET USER LOGINS
            $logins = UserLog::where('user_id', Auth::user()->id)->orderBy('updated_at', 'desc')->take(5)->get();

            return $form->view('rapyd-dashboard::profile.index', compact('form', 'logins'))
                ->with('title', 'Edit profile');

        }

    }

?>