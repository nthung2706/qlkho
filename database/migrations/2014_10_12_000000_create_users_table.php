<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
        'facebook_id',
        'google_id'
];
    public function up()
    {
        Schema::create('nguoidungs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username',100)->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->unsignedTinyInteger('chucvu')->default(1);
            $table->rememberToken();
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
        Schema::dropIfExists('nguoidungs');
    }
}
