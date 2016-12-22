<?php

    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;

    class CreateRolesTable extends Migration {

        public function up() {

            Schema::create('users_roles', function($table) {
                $table->increments('id');
                $table->string('name', 40);
                $table->string('description', 255);
                $table->timestamps();
            });


            Schema::table('users', function($table) {
                $table->integer('role_id')->unsigned()->nullable()->after('id');
                $table->foreign('role_id')->references('id')->on('users_roles')->onDelete('set null');
            });

            # INSERT DEFAULT ROLES
            DB::table('users_roles')->insert([
                ['name' => 'admin', 'description' => 'Backend Admin', 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
                ['name' => 'user' , 'description' => 'Backend User' , 'created_at' => date('Y-m-d H:i:s'), 'updated_at' => date('Y-m-d H:i:s')],
            ]);

        }

        public function down() {

            Schema::table('users', function($table) {
                $table->dropForeign('users_role_id_foreign');
                $table->dropColumn(['role_id']);
            });

            Schema::dropIfExists('users_roles');

        }

    }

?>