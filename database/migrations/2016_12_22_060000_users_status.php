<?php

    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;

    class UsersStatus extends Migration {

        public function up() {

            Schema::table('users', function($table) {
                $table->boolean('status')->after('remember_token')->default('1');
            });

        }

        public function down() {

            Schema::table('users', function ($table) {
                $table->dropColumn(['status']);
            });

        }

    }

?>