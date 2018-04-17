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
            $table->integer('profile_pic_id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('gender')->nullable();
            $table->string('address')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('age')->nullable();
            $table->string('profile_privacy');
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
