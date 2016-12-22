<?php

    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;

    class CreateUsersTable extends Migration {

        public function up() {

            Schema::create('users', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name'    ,  80);
                $table->string('email'   , 100)->unique();
                $table->string('password',  60)->nullable();
                $table->rememberToken();
                $table->timestamps();
            });

        }

        public function down() {
            Schema::drop('users');
        }

    }

?>