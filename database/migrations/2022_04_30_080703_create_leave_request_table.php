<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeaveRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leave_request', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('user_id');
            $table->enum('leave_type', ['CL', 'SL', 'PL', 'LWP'])->nullable()->comment("CL=Casual Leave, SL=Sick Leave, PL=Paid Leave, LWP=Leave Without Pay");
            $table->integer('number_of_days');
            $table->date('leave_start_date');
            $table->date('leave_end_date');
            $table->string('leave_month');
            $table->boolean('leave_status')->nullable();
            $table->text('authorized_reason')->nullable();
            $table->unsignedBigInteger('authorized_by');

            $table->boolean('status')->default(0);           
            $table->timestamps();
            $table->string('crea_user')->nullable();
            $table->string('mod_user')->nullable();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('authorized_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leave_request');
    }
}
