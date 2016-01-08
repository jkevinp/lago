
<?php

class FilesTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Files::truncate();

		$files  = Files::create(array(
				'id' => '0',
				'imagename' => 'default.jpg',
				'directory' => URL::asset('default/img-uploads'),
				'description' => ''
			));
		$files  = Files::create(array(
				'imagename' => '1.jpg',
				'directory' => URL::asset('default/img-uploads'),
				'description' => ''
			));
		$files  = Files::create(array(
				'imagename' => '2.jpg',
				'directory' => URL::asset('default/img-uploads'),
				'description' => ''
			));
		$files  = Files::create(array(
				'imagename' => '3.jpg',
				'directory' => URL::asset('default/img-uploads'),
				'description' => ''
			));
		$files  = Files::create(array(
				'imagename' => '4.jpg',
				'directory' => URL::asset('default/img-uploads'),
				'description' => ''

			));
		$files  = Files::create(array(
				'imagename' => '5.jpg',
				'directory' => URL::asset('default/img-uploads'),
				'description' => ''

			));
		$files  = Files::create(array(
				'imagename' => '6.jpg',
				'directory' => URL::asset('default/img-uploads'),
				'description' => ''

			));
		$files  = Files::create(array(
				'imagename' => '7.jpg',
				'directory' => URL::asset('default/img-uploads'),
				'description' => ''

			));
		$files  = Files::create(array(
				'imagename' => '8.jpg',
				'directory' => URL::asset('default/img-uploads'),
				'description' => ''

			));
		$files  = Files::create(array(
				'imagename' => '9.jpg',
				'directory' => URL::asset('default/img-uploads'),
				'description' => ''

			));
		$files  = Files::create(array(
				'imagename' => 'child.jpg',
				'directory' => URL::asset('default/img-uploads'),
				'description' => ''

			));
		$files  = Files::create(array(
				'imagename' => 'adult.jpg',
				'directory' => URL::asset('default/img-uploads'),
				'description' => ''

			));
		$files = Files::create(array(
				'imagename' => 'gMqPQj3vbed.jpg',
				'directory' => URL::asset('default/img-uploads'),
				'description' => ''
			));
		$files->save();
	}

}
