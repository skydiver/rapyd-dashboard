<?php

    namespace Skydiver\RapydDashboard\Models;

    use Illuminate\Auth\Authenticatable;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Auth\Passwords\CanResetPassword;
    use Illuminate\Foundation\Auth\Access\Authorizable;
    use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
    use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
    use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

    class User extends Model implements AuthenticatableContract, AuthorizableContract, CanResetPasswordContract {

        use Authenticatable, Authorizable, CanResetPassword;

        /**
         * The database table used by the model.
         *
         * @var string
         */
        protected $table = 'users';

        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = ['name', 'email', 'password'];

        /**
         * The attributes excluded from the model's JSON form.
         *
         * @var array
         */
        protected $hidden = ['password', 'remember_token'];


        public function role() {
            return $this->hasOne('Skydiver\RapydDashboard\Models\Role', 'id', 'role_id');
        }

        public function getRoleAttribute() {
            return $this->role()->getResults()['name'];
        }

        public function getRoleDescriptionAttribute() {
            return $this->role()->getResults()['description'];
        }

        public function getStatusIconAttribute() {
            return ($this->status == 1) ? 'fa-toggle-on' : 'fa-toggle-off';
        }

        private function getUserRole() {
            return $this->role()->getResults();
        }

        private function checkIfUserHasRole($need_role) {
            return (strtolower($need_role) == strtolower($this->have_role->name)) ? true : false;
        }

        public function hasRole($roles) {

            $this->have_role = $this->getUserRole();

            if($this->have_role->name == 'admin') {
                return true;
            }

            if(is_array($roles)) {

                foreach($roles as $need_role) {
                    if($this->checkIfUserHasRole($need_role)) {
                        return true;
                    }
                }

            } else {
                return $this->checkIfUserHasRole($roles);
            }

            return false;

        }

    }

?>