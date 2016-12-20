<?php

    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;

    class UpdateUsersTable extends Migration {

        public function up() {

            Schema::table('users', function($table) {
                $table->enum('avatar', ['avatar.png', 'avatar2.png', 'avatar3.png', 'avatar04.png', 'avatar5.png'])->after('password')->default('avatar.png');
                $table->enum('theme' , ['skin-blue', 'skin-blue-light', 'skin-yellow', 'skin-yellow-light', 'skin-green', 'skin-green-light', 'skin-purple', 'skin-purple-light', 'skin-red', 'skin-red-light', 'skin-black', 'skin-black-light'])->after('avatar')->default('skin-blue');
            });

        }

        public function down() {

            Schema::table('users', function ($table) {
                $table->dropColumn(['avatar', 'theme']);
            });

        }

    }

?>