<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHoadonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoadons', function (Blueprint $table) {
            $table->id();
            $table->string('nguoilap');
            $table->foreignId('tinhtrang_id')->constrained('tinhtrangs');
            $table->date('ngaylap');           
            $table->string('sdt');
            $table->string('ten');
            $table->string('tinh')->nullable();
            $table->string('huyen')->nullable();
            $table->string('thitran')->nullable();
            $table->boolean('trangthai');
            $table->string('ghichu')->nullable();
            $table->timestamps();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hoadons');
    }
}
