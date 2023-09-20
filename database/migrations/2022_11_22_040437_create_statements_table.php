<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Gate; 

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statements', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('surname');
            $table->string('last_name')->nullable();
            $table->string('email');
            $table->foreignId('specialization_id');
            $table->foreignId('user_id');
            $table->string('snils')->nullable();
            $table->string('phone_number');
            $table->string('nationality');
            $table->string('place_of_birth');
            $table->string('registered');
            $table->string('living');
            $table->string('pasport_seria');
            $table->string('pasport_number');
            $table->string('issued');
            $table->string('image_1')->nullable();
            $table->string('image_2')->nullable();
            $table->string('image_3')->nullable();
            $table->string('image_4')->nullable();
            $table->date('birthsday_date');
            $table->string('education_level');
            $table->float('atestat_bal');
            $table->date('date_of_end');
            $table->string('language');  
            $table->string('parent_info');
            $table->string('parent_phone')->nullable();            
            $table->string('parent_other')->nullable();
            $table->string('count_education');
            $table->boolean('dormitory');
            $table->boolean('accept_1');
            $table->boolean('accept_2');
            $table->boolean('accept_3');
            $table->boolean('special_condition');
            $table->string('status')->default('В обработке');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statements');
    }
};
