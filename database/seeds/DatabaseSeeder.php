<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		$this->call('GroupTableSeeder');
		$this->call('UserTableSeeder');
		$this->call('PostTableSeeder');
		$this->call('NewsTableSeeder');
		$this->call('CommentTableSeeder');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
	}

}
