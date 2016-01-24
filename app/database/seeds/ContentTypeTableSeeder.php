<?php

class ContentTypeTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		ContentType::truncate();
		$ct = ContentType::create(array(
				'contentkey' => 'media',
				'contentvalue' => 'carousel_mainpage'
			));
		$ct = ContentType::create(array(
				'contentkey' => 'text',
				'contentvalue' => 'about_text'
			));
		$ct = ContentType::create(array(
				'contentkey' => 'contact',
				'contentvalue' => 'footer'
			));
		$ct->save();
	}
}