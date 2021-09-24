<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDataColumnToSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->string('upt')->nullable();
            $table->string('survey')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();
            $table->string('youtube')->nullable();
            $table->string('link1')->nullable();
            $table->string('link2')->nullable();
            $table->string('link3')->nullable();
            $table->string('link4')->nullable();
            $table->string('dokumen')->nullable();
            $table->string('nowa')->nullable();
            $table->longtext('rekening')->nullable();
            $table->string('wag')->nullable();
            $table->string('token')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->dropColumn('upt');
            $table->dropColumn('survey');
            $table->dropColumn('facebook');
            $table->dropColumn('instagram');
            $table->dropColumn('twitter');
            $table->dropColumn('youtube');
            $table->dropColumn('link1');
            $table->dropColumn('link2');
            $table->dropColumn('link3');
            $table->dropColumn('link4');
            $table->dropColumn('dokumen');
            $table->dropColumn('nowa');
            $table->dropColumn('rekening');
            $table->dropColumn('wag');
            $table->dropColumn('token');
        });
    }
}
