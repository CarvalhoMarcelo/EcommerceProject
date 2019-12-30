<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToUsuarioInMeetapples extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('usuario', function (Blueprint $table) {
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::table('usuario', function (Blueprint $table) {
            $table->dropColumn('remember_token');
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
        });
        Schema::enableForeignKeyConstraints();
    }
}
