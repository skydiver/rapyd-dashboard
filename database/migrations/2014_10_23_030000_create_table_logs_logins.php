<?php

    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;

    class CreateTableLogsLogins extends Migration {

        public function up() {
            Schema::create('logs_logins', function($table) {
                $table->increments('id')->unsigned();
                $table->integer('user_id')->unsigned()->nullable();
                $table->foreign('user_id')->references('id')->on('users');
                $table->string ('email', 200);
                $table->string ('ip'   , 100);
                $table->enum   ('result', ['successful', 'failed']);
                $table->timestamps();
            });
        }

        public function down() {
            Schema::drop('logs_logins');
        }

    }

?>