<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('questions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->mediumText('desc');
			$table->string('type',50);
			$table->tinyInteger('status');
			$table->integer('author_id')->unsigned();
			$table->timestamps();
            $table->softDeletes();

            $table->foreign('author_id')
                    ->references('id')
                        ->on('users')
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
		Schema::drop('questions');
	}

}
