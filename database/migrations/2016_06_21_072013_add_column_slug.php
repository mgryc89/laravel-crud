<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnSlug extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('names', function ( $table) {
            $table->string('slug')->unique()->after('sername');
        });

        Schema::table('names', function ( $table) {
            $table->dropColumn('plec');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
         Schema::table('names', function ( $table) {
            $table->dropColumn('slug');
        });
    }
}
