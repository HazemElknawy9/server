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
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('image')->default('default.png');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->date('date_birth')->nullable();
            $table->string('governrate')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->bigInteger('postal_code')->nullable();
            $table->string('password');
            $table->string('channel_promote')->nullable();
            $table->string('website')->nullable();
            $table->tinyInteger('terms')->nullable();
            $table->tinyInteger('active')->nullable();
            $table->bigInteger('code')->nullable();
            $table->tinyInteger('mail_order_changed')->default(1);
            $table->tinyInteger('sms_order_changed')->default(1);
            $table->tinyInteger('mail_data_changed')->default(1);
            $table->tinyInteger('mail_weekly')->default(1);
            $table->timestamp('email_verified_at')->nullable();
            $table->bigInteger('number_id')->nullable();
            $table->string('history_email')->nullable();
            $table->string('history_phone')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
            $table->userstamps();
            $table->softUserstamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
