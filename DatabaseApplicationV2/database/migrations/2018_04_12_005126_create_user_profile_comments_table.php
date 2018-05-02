<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProfileCommentsTable extends Migration
{
  const CREATED_AT = 'creation_date';
  const UPDATED_AT = 'last_edit_date';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profile_comments', function (Blueprint $table) {
          $table->increments('user_profile_comment_id');
          $table->integer('user_id'); //who made the comment
          $table->integer('user_profile_id'); //which user profile the komment is on
          $table->mediumText('comment_string');
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
        Schema::dropIfExists('user_profile_comments');
    }
}
