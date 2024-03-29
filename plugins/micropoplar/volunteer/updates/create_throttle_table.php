<?php namespace Micropoplar\Volunteer\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateThrottleTable extends Migration
{

    public function up()
    {
        Schema::create('micropoplar_volunteer_volunteers_throttle', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('volunteer_id')->unsigned()->nullable()->index();
            $table->string('ip_address')->nullable()->index();
            $table->integer('attempts')->default(0);
            $table->timestamp('last_attempt_at')->nullable();
            $table->boolean('is_suspended')->default(0);
            $table->timestamp('suspended_at')->nullable();
            $table->boolean('is_banned')->default(0);
            $table->timestamp('banned_at')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('micropoplar_volunteer_volunteers_throttle');
    }

}
