<?php

    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;

    class RemoveAvatarField extends Migration {

        public function up() {

            Schema::table('users', function ($table) {
                $table->dropColumn('avatar');
            });

        }

        public function down() {

            Schema::table('users', function($table) {
                $table->enum('avatar', ['avatar.png', 'avatar2.png', 'avatar3.png', 'avatar04.png', 'avatar5.png'])->after('password')->default('avatar.png');
            });

        }

    }

?>