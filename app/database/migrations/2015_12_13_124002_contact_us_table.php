<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ContactUsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::create('contact_us',function($table){
                $table->bigIncrements('id');
                $table->string('name');
                $table->string('email');
                $table->string('phone_number',20);
                $table->string('contact_method');
                $table->text('enquiry_info');
                $table->string('invoice_number',10);
            });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
            Schema::drop('contact_us');
	}

}
