<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{

    public $tableName = 'users';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('fullname')->nullable();
            $table->string('nickname')->nullable();
            $table->string('name')->nullable();
            $table->string('email');
            $table->string('password');
            $table->integer('age')->nullable()->default(null);
            $table->char('sex')->nullable()->default(null);
            $table->string('comment', 255)->nullable()->default(null);
            $table->string('icon')->nullable()->default(null);
            $table->string('twitter_id')->nullable()->default(null);
            $table->string('avatar')->nullable()->default(null);
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
        Schema::dropIfExists($this->tableName);
    }
}
