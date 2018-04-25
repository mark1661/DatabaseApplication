<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    protected $primaryKey = 'user_profile_id';
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->increments('user_profile_id');
            $table->integer('profile_pic_id')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('gender')->nullable();
            $table->string('location')->nullable();
            $table->string('age')->nullable();
            $table->string('profile_privacy')->nullable();
            $table->string('file_name', 55)->nullable();
            $table->string('file_path', 155)->nullable();
            $table->string('file_description')->nullable();

//if a user is deleted, it's associated profile should be deleted too.
// no sense in deleting a profile that still has a user.
            $table->foreign('user_profile_id')
                  ->references('user_id')->on('users')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_profiles');
    }
}