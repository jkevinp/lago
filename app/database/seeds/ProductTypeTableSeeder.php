
<?php

class ProductTypeTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		ProductType::truncate();
		$ProductType  = ProductType::create(array(
				'producttypename' => 'Cottages'
			));
		$ProductType  = ProductType::create(array(
				'producttypename' => 'Rooms'
			));
		$ProductType  = ProductType::create(array(
				'producttypename' => 'Admission'
		));
		$ProductType  = ProductType::create(array(
				'producttypename' => 'Others'
		));
		$ProductType->save();
	}

}
