<?php

    namespace Skydiver\RapydDashboard\Controllers;

    use Skydiver\RapydDashboard\Models\LogLogin, Skydiver\RapydDashboard\Models\User;
    use Auth, Config, Session, View;
    use Illuminate\Routing\Controller;
    use Illuminate\Http\Request;
    use Socialite;

    class OAuthController extends Controller {

        public function getSSOLogin() {
            return View::make('rapyd-dashboard::auth.ssologin');
        }

        public function getRedirGoogle() {
            return Socialite::driver('google')
                ->scopes(['email'])
                ->redirect();
        }

        public function getLoginGoogle(Request $request) {

            # GET OAUTH DATA
            $oauth = Socialite::driver('google')->user();

            # GET USER
            $user = User::where('email', $oauth->email)->first();

            # LOGIN OR KICK
            if($user) {

                // # RECORD LOGIN
                $log = new LogLogin;
                $log->user_id = $user->id;
                $log->email   = $oauth->email;
                $log->ip      = $request->ip();
                $log->result  = 'successful';
                $log->save();

                Auth::login($user);
                return redirect()->action('\Skydiver\RapydDashboard\Controllers\DashboardController@getIndex');

            } else {

                // # RECORD LOGIN
                $log = new LogLogin;
                $log->email   = $oauth->email;
                $log->ip      = $request->ip();
                $log->result  = 'failed';
                $log->save();

                Session::flash('message', array('type' => 'danger', 'msg' => 'No user found.<br>Attempt has been recorded.'));
                return redirect()->action('\Skydiver\RapydDashboard\Controllers\OAuthController@getSSOLogin');

            }

        }

    }

?>