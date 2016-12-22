<?php

    namespace Skydiver\RapydDashboard\Controllers;

    use Auth, Session;
    use Socialite;
    use Illuminate\Http\Request;
    use App\Http\Controllers\Controller;
    use Skydiver\RapydDashboard\Models\UserLog;
    use Skydiver\RapydDashboard\Models\User;

    class AuthController extends Controller {

        public function redirectToGoogle() {
            return Socialite::driver('google')->redirect();
        }

        public function handleGoogleCallback(Request $request) {

            # GET OAUTH DATA
            $oauth = Socialite::driver('google')->user();

            # GET USER
            $user = User::where('email', $oauth->email)->first();

            # LOGIN OR KICK
            if($user && $user->status == 1) {

                # RECORD LOGIN
                $log = new UserLog;
                $log->user_id = $user->id;
                $log->email   = $oauth->email;
                $log->ip      = $request->ip();
                $log->result  = 'successful';
                $log->save();

                # LOGIN USER & REDIRECT
                Auth::login($user);
                return redirect()->route('dashboard-home');

            } else {

                # RECORD LOGIN
                $log = new UserLog;
                $log->email   = $oauth->email;
                $log->ip      = $request->ip();
                $log->result  = ($user && $user->status == 0) ? 'disabled' : 'failed';
                $log->save();

                # ERROR MESSAGE
                $msg = ($user && $user->status == 0) ? 'User disabled.' : 'No user found.';

                # SHOW ERROR
                Session::flash('message', array('type' => 'danger', 'msg' => $msg));
                return redirect()->route('dashboard-login');

            }

        }

    }

?>