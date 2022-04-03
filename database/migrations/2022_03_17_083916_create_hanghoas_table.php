<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHanghoasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hanghoas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('loaisp_id')->constrained('loaisps');
            $table->foreignId('nguoncungcap_id')->constrained('nguoncungcaps');
            $table->string('tenhh', 100);
            $table->integer('gianhap');
            $table->integer('giaban');
            $table->integer('soluong');
            $table->date('ngaynhap');
            $table->text('chitiet')->nullable();
            $table->string('hinhanh')->nullable();;
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
        Schema::dropIfExists('hanghoas');
    }
}
