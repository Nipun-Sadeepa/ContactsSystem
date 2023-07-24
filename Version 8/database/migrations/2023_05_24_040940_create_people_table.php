<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->foreignId("customerId");
            $table->string("fName");
            $table->string("lName");
            $table->string("email")->unique();
            $table->integer("contactNo");
            $table->string("address");
            $table->string("gender"); 
            $table->string("status")->default("active");
            $table->integer("lastEditCustomer")->nullable();
            $table->mediumText("password")->nullable();
            $table->string("role")->default("contact");
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
        Schema::dropIfExists('people');
    }
}
