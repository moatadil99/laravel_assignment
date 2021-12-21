<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificates', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('issuer_ca_id');
            $table->string('issuer_name');
            $table->string('common_name');
            $table->string('name_value');
            $table->timestamp('entry_timestamp')->nullable();
            $table->timestamp('not_before')->nullable();
            $table->timestamp('not_after')->nullable();
            $table->string('serial_number');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('certificates');
    }
}
