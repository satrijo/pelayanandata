<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLatColumnToContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->string('kontak')->after('id');
            $table->string('latlon')->after('kontak');
            $table->longText('alamat')->after('latlon');
            $table->string('telp')->after('alamat');
            $table->string('email')->after('telp');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->dropColumn('kontak', 'latlot', 'alamat', 'telp', 'email');
        });
    }
}
