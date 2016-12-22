<?php

    namespace Skydiver\RapydDashboard\Models;

    use Illuminate\Database\Eloquent\Model;

    class Role extends Model {

        protected $table = 'users_roles';

        public function users() {
            return $this->hasMany('Skydiver\RapydDashboard\Models\User', 'role_id', 'id');
        }

    }

?>