<?php namespace Micropoplar\Volunteer\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateVolunteersTable extends Migration
{

    public function up()
    {
        Schema::create('micropoplar_volunteer_volunteers', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('identity_number')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('activation_code')->nullable()->index();
            $table->string('persist_code')->nullable();
            $table->string('reset_password_code')->nullable()->index();
            $table->text('permissions')->nullable();
            $table->boolean('is_activated')->default(0);
            $table->timestamp('activated_at')->nullable();
            $table->timestamp('last_login')->nullable();
            $table->timestamps();

            // contact information
            $table->string('phone', 100)->unique();
            $table->string('company', 100)->nullable();
            $table->string('street_addr')->nullable();
            $table->string('city', 100)->nullable();
            $table->string('district', 100)->nullable();
            $table->string('zip', 20)->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('micropoplar_volunteer_volunteers');
    }

}
