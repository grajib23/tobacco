<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionAnswerTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('question_answer', function(Blueprint $table)
		{
			$table->increments('id');
			$table->text('answer');
			$table->tinyInteger('status');
			$table->integer('question_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->timestamps();

            $table->foreign('question_id')
                        ->references('id')
                            ->on('questions')
                                ->onDelete('cascade');

            $table->foreign('user_id')
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
		Schema::drop('question_answer');
	}

}
