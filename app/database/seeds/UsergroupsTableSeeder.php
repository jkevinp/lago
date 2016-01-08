<?php

class UsergroupsTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Usergroup::truncate();
		$Usergroup  = Usergroup::create(array(
				'usergroupname' => 'staff',
				'usergroupauth' => 3
			));
		$Usergroup  = Usergroup::create(array(
				'usergroupname' => 'user',
				'usergroupauth' => 2
			));
		$Usergroup  = Usergroup::create(array(
				'usergroupname' => 'admin',
				'usergroupauth' => 1
			));
		$Usergroup->save();
	}
}