<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('invoice')->nullable();
            $table->string('nama')->nullable();
            $table->string('nik')->nullable();
            $table->string('nohp')->nullable();
            $table->string('email')->nullable();
            $table->string('instansi')->nullable();
            $table->string('jenispelayanan')->nullable();
            $table->text('alamat')->nullable();
            $table->string('suratpermohonan')->nullable();
            $table->string('scanktp')->nullable();
            $table->string('suratpengantar')->nullable();
            $table->string('suratpernyataan')->nullable();
            $table->string('proposal')->nullable();
            $table->string('parametercuaca')->nullable();
            $table->string('periodedari')->nullable();
            $table->string('periodesampai')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('kode')->nullable();
            $table->string('pembayaran');
            $table->integer('total')->nullable();
            $table->string('qrcode')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
