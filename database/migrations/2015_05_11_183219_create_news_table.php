<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('news', function(Blueprint $table)
		{
            $table->increments('id');
            $table->string('title',100);
            $table->text('desc');
            $table->string('image_url',200);
            $table->string('share_url',200);
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
		Schema::drop('news');
	}

}
