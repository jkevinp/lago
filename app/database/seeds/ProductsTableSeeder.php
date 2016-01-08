<?php

class ProductsTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Product::truncate();
		//diamord rooms
		$products  = Product::create(array('productname' => 'Diamond One',
					'productdesc' => 'Diamond 1 or D-1 can accomodate up to 4 - 6 person. With Aircondition, TV and Private Toilet.',
					'productquantity' => '1',
					'productprice' => '2000',
					'fileid'=> '2' ,
					'producttypeid' => 2
					));

		$products = Product::create(
					array('productname' => 'Diamond Two',
					'productdesc' => 'Diamond-2 can accomodate up to 2 - 3 person. With Aircondition, TV and Toilet.',
					'productquantity' => '1',
					'productprice' => '1200',
					'fileid'=> '3',
					'producttypeid' => 2 ));

		$products = Product::create(
					array('productname' => 'Diamond Three',
					'productdesc' => 'Diamond-3 can accomodate up to 2 - 3 person. With Aircondition, TV and Toilet.',
					'productquantity' => '1',
					'productprice' => '1300',
					'fileid'=> '3',
					'producttypeid' => 2 ));

		$products  = Product::create(array('productname' => 'Diamond Four',
					'productdesc' => 'Without Aircondition and Toilet.',
					'productquantity' => '1',
					'productprice' => '800',
					'fileid'=> '2' ,
					'producttypeid' => 2
					));

		$products = Product::create(
					array('productname' => 'Diamond Five',
					'productdesc' => 'Without Aircondition and Toilet.',
					'productquantity' => '1',
					'productprice' => '800',
					'fileid'=> '3',
					'producttypeid' => 2));

		$products = Product::create(
					array('productname' => 'Diamond Six',
					'productdesc' => 'Without Aircondition and Toilet.',
					'productquantity' => '1',
					'productprice' => '800',
					'fileid'=> '3',
					'producttypeid' => 2 ));



		//opal and pearl
		$products = Product::create(
					array('productname' => 'Opal & Pearl',
					'productdesc' => 'Opal or Perl can accomodate 2 person. With Aircondition, TV and Private Toilet.',
					'productquantity' => '1',
					'productprice' => '1200',
					'fileid'=> '4' ,
					'producttypeid' => 2)
					);

		//Ruby rooms
		$products = Product::create(
		array(
					'productname' => 'RUBY 1',
					'productdesc' => 'Ruby 1 can accomodate 2 person. With Aircondition, TV and Private Toilet.',
					'productquantity' => '1',
					'productprice' => '1500',
					'fileid'=> '5' ,
					'producttypeid' => 2
			));

		$products = Product::create(
			array(
					'productname' => 'RUBY 2',
					'productdesc' => 'Ruby 2 can accomodate 2 person. With Aircondition, TV and Private Toilet.',
					'productquantity' => '1',
					'productprice' => '1500',
					'fileid'=> '5' ,
					'producttypeid' => 2
			));


		$products = Product::create(
		array(
					'productname' => 'RUBY 3',
					'productdesc' => 'Ruby 3 can accomodate 2 person. With Aircondition, TV and Private Toilet w/ Hot Shower.',
					'productquantity' => '1',
					'productprice' => '1800',
					'fileid'=> '6' ,
					'producttypeid' => 2
			));

		$products = Product::create(
		array(
					'productname' => 'RUBY 4',
					'productdesc' => 'Ruby 4 can accomodate 2 person. With Aircondition, TV and Private Toilet w/ Hot Shower.',
					'productquantity' => '1',
					'productprice' => '1800',
					'fileid'=> '6' ,
					'producttypeid' => 1
			));

		$products = Product::create(
		array(
					'productname' => 'RUBY 5',
					'productdesc' => 'Ruby 5 can accomodate 4 - 6 person. With Aircondition, TV and Private Toilet w/ Hot Shower & Jacuzzi.',
					'productquantity' => '1',
					'productprice' => '3500',
					'fileid'=> '7' ,
					'producttypeid' => 2
			));
		$products = Product::create(
		array(
					'productname' => 'RUBY 6',
					'productdesc' => 'Ruby 6 can accomodate 4 - 6 person. With Aircondition, TV and Private Toilet w/ Hot Shower & Jacuzzi.',
					'productquantity' => '1',
					'productprice' => '3500',
					'fileid'=> '7' ,
					'producttypeid' => 2
		));
		//Ruby Seminar Rooms
		$products = Product::create(
		array(
					'productname' => 'Ruby Seminar Room',
					'productdesc' => 'Ruby Seminar Room can accomodate 80 - 100 person.',
					'productquantity' => '1',
					'productprice' => '6500',
					'fileid'=> '7' ,
					'producttypeid' => 2
		));
		//Sapphire
		$products = Product::create(
		array(
					'productname' => 'Sapphire',
					'productdesc' => 'Sapphire can accomodate 80 - 100 person.',
					'productquantity' => '1',
					'productprice' => '3500',
					'fileid'=> '7' ,
					'producttypeid' => 2
		));

		//topaz rooms
		$products = Product::create(
				array(
					'productname' => 'TOPAZ 1 UPPER',
					'productdesc' => 'Topaz 1 can accomodate 2 - 15 person. With Aircondition, TV, Private Toilet and Kitchen. Topaz room is good for those who conduct there retreat.',
					'productquantity' => '1',
					'productprice' => '4000',
					'fileid'=> '8' ,
					'producttypeid' => 2
			));

		$products = Product::create(
				array(
					'productname' => 'TOPAZ 2 LOWER',
					'productdesc' => 'Topaz 1 can accomodate 2 - 15 person. With Aircondition, TV, Private Toilet and Kitchen. Topaz room is good for those who conduct there retreat.',
					'productquantity' => '1',
					'productprice' => '3500',
					'fileid'=> '9' ,
					'producttypeid' => 2
				));

		$products = Product::create(
		array(
					'productname' => 'MULTI-PURPOSE',
					'productdesc' => 'Mutli-Purpose can accomodate 80 - 150 person. Its good for kids party and Wedding Venue.',
					'productquantity' => '1',
					'productprice' => '6000',
					'fileid'=> '10' ,
					'producttypeid' => 2
		));

		$products = Product::create(
		array(
					'productname' => 'Children Admission Ticket',
					'productdesc' => 'Fee for children.',
					'productquantity' => '1',
					'productprice' => '100',
					'fileid'=> '11' ,
					'producttypeid' => 3
		));

		$products = Product::create(
		array(
					'productname' => 'Adult Admission Ticket',
					'productdesc' => 'Fee for adults.',
					'productquantity' => '1',
					'productprice' => '130',
					'fileid'=> '12' ,
					'producttypeid' => 3
		));

		$products = Product::create(
		array(
					'productname' => 'Night Rate Children Admission Ticket',
					'productdesc' => 'Night rate Fee for children',
					'productquantity' => '1',
					'productprice' => '120',
					'fileid'=> '11' ,
					'producttypeid' => 3
		));

		$products = Product::create(
		[
					'productname' => 'Night Rate Adult Admission Ticket',
					'productdesc' => 'Night rate Fee for adults. ',
					'productquantity' => '1',
					'productprice' => '150',
					'fileid'=> '12' ,
					'producttypeid' => 3
		]);

		$products = Product::create(
		[
					'productname' => 'Extra Bed',
					'productdesc' => 'A comfortable bed for rentals.',
					'productquantity' => '1',
					'productprice' => '200',
					'fileid'=> '13' ,
					'producttypeid' => 4
		]);


		$products = Product::create(
		array(
					'productname' => 'Concrete Round tables',
					'productdesc' => '4-6 Persons.',
					'productquantity' => '1',
					'productprice' => '300',
					'fileid'=> '10' ,
					'producttypeid' => 1
		));

		$products = Product::create(
		array(
					'productname' => 'Concrete Square tables',
					'productdesc' => '4-6 Persons.',
					'productquantity' => '1',
					'productprice' => '350',
					'fileid'=> '10' ,
					'producttypeid' => 1
		));

		$products = Product::create(
		array(
					'productname' => 'Cottage #1',
					'productdesc' => '20 Persons.',
					'productquantity' => '1',
					'productprice' => '1800',
					'fileid'=> '10' ,
					'producttypeid' => 1
		));

		$products = Product::create(
		array(
					'productname' => 'Cottage #2',
					'productdesc' => '18 Persons.',
					'productquantity' => '1',
					'productprice' => '1200',
					'fileid'=> '10' ,
					'producttypeid' => 1
		));
		$products = Product::create(
		array(
					'productname' => 'Cottage #3',
					'productdesc' => '18 Persons.',
					'productquantity' => '1',
					'productprice' => '1200',
					'fileid'=> '10' ,
					'producttypeid' => 1
		));
		$products = Product::create(
		array(
					'productname' => 'Cottage #4',
					'productdesc' => '10 Persons.',
					'productquantity' => '1',
					'productprice' => '600',
					'fileid'=> '10' ,
					'producttypeid' => 1
		));
		$products = Product::create(
		array(
					'productname' => 'Cottage #5',
					'productdesc' => '10 Persons.',
					'productquantity' => '1',
					'productprice' => '600',
					'fileid'=> '10' ,
					'producttypeid' => 1
		));
		$products = Product::create(
		array(
					'productname' => 'Cottage #6',
					'productdesc' => '10 Persons.',
					'productquantity' => '1',
					'productprice' => '600',
					'fileid'=> '10' ,
					'producttypeid' => 1
		));
		$products = Product::create(
		array(
					'productname' => 'Cottage #7',
					'productdesc' => '10 Persons.',
					'productquantity' => '1',
					'productprice' => '600',
					'fileid'=> '10' ,
					'producttypeid' => 1
		));
		$products = Product::create(
		array(
					'productname' => 'Cottage #8',
					'productdesc' => '10 Persons.',
					'productquantity' => '1',
					'productprice' => '600',
					'fileid'=> '10' ,
					'producttypeid' => 1
		));

		$products = Product::create(
		array(
					'productname' => 'Cottage #9',
					'productdesc' => '15 Persons. With Grill and faucet.',
					'productquantity' => '1',
					'productprice' => '1000',
					'fileid'=> '10' ,
					'producttypeid' => 1
		));


		$products = Product::create(
		array(
					'productname' => 'Cottage #10',
					'productdesc' => '15 Persons. With Grill and faucet.',
					'productquantity' => '1',
					'productprice' => '1000',
					'fileid'=> '10' ,
					'producttypeid' => 1
		));

		$products = Product::create(
		array(
					'productname' => 'Cottage #11',
					'productdesc' => '15 Persons. With Grill and faucet.',
					'productquantity' => '1',
					'productprice' => '1000',
					'fileid'=> '10' ,
					'producttypeid' => 1
		));

		$products = Product::create(
		array(
					'productname' => 'Cottage #12',
					'productdesc' => '18 Persons.',
					'productquantity' => '1',
					'productprice' => '1200',
					'fileid'=> '10' ,
					'producttypeid' => 1
		));

		$products = Product::create(
		array(
					'productname' => 'Cottage Swing #13',
					'productdesc' => '4 Persons.',
					'productquantity' => '1',
					'productprice' => '400',
					'fileid'=> '10' ,
					'producttypeid' => 1
		));
		$products = Product::create(
		array(
					'productname' => 'Cottage #14',
					'productdesc' => '20 Persons. Overlooking with grill and faucet.',
					'productquantity' => '1',
					'productprice' => '1500',
					'fileid'=> '10' ,
					'producttypeid' => 1
		));
		$products = Product::create(
		array(
					'productname' => 'Cottage #15',
					'productdesc' => '20 Persons. Overlooking with grill and faucet.',
					'productquantity' => '1',
					'productprice' => '1500',
					'fileid'=> '10' ,
					'producttypeid' => 1
		));
		$products = Product::create(
		array(
					'productname' => 'Cottage #16',
					'productdesc' => '20 Persons. Overlooking with grill and faucet.',
					'productquantity' => '1',
					'productprice' => '1500',
					'fileid'=> '10' ,
					'producttypeid' => 1
		));

		$products = Product::create(
		array(
					'productname' => 'Cottage #17',
					'productdesc' => '14-16 persons.',
					'productquantity' => '1',
					'productprice' => '700',
					'fileid'=> '10' ,
					'producttypeid' => 1
		));

		$products = Product::create(
		array(
					'productname' => 'Cottage #18',
					'productdesc' => '14-16 persons.',
					'productquantity' => '1',
					'productprice' => '700',
					'fileid'=> '10' ,
					'producttypeid' => 1
		));

		$products = Product::create(
		array(
					'productname' => 'Cottage #19',
					'productdesc' => '14-16 persons.',
					'productquantity' => '1',
					'productprice' => '700',
					'fileid'=> '10' ,
					'producttypeid' => 1
		));
		$products = Product::create(
		array(
					'productname' => 'Calleza Type tables #20',
					'productdesc' => '10 persons.',
					'productquantity' => '1',
					'productprice' => '700',
					'fileid'=> '10' ,
					'producttypeid' => 1
		));
		$products = Product::create(
		array(
					'productname' => 'Calleza Type tables #21',
					'productdesc' => '10 persons.',
					'productquantity' => '1',
					'productprice' => '700',
					'fileid'=> '10' ,
					'producttypeid' => 1
		));
		$products = Product::create(
		array(
					'productname' => 'Cottage #22',
					'productdesc' => '8 persons.',
					'productquantity' => '1',
					'productprice' => '500',
					'fileid'=> '10' ,
					'producttypeid' => 1
		));

		$products = Product::create(
		array(
					'productname' => 'Cottage #23',
					'productdesc' => '15 persons.',
					'productquantity' => '1',
					'productprice' => '800',
					'fileid'=> '10' ,
					'producttypeid' => 1
		));
		$products = Product::create(
		array(
					'productname' => 'Cottage #24',
					'productdesc' => '15 persons.',
					'productquantity' => '1',
					'productprice' => '800',
					'fileid'=> '10' ,
					'producttypeid' => 1
		));

		$products = Product::create(
		array(
					'productname' => 'Concrete Tables #25',
					'productdesc' => '10 persons.',
					'productquantity' => '1',
					'productprice' => '700',
					'fileid'=> '10' ,
					'producttypeid' => 1
		));
		$products = Product::create(
		array(
					'productname' => 'Calleza Type table #26',
					'productdesc' => '6 persons.',
					'productquantity' => '1',
					'productprice' => '500',
					'fileid'=> '10' ,
					'producttypeid' => 1
		));
		$products = Product::create(
		array(
					'productname' => 'Calleza Type tables #27',
					'productdesc' => '10 persons.',
					'productquantity' => '1',
					'productprice' => '700',
					'fileid'=> '10' ,
					'producttypeid' => 1
		));
		$products = Product::create(
		array(
					'productname' => 'Concrete Tables #28',
					'productdesc' => '10 persons.',
					'productquantity' => '1',
					'productprice' => '700',
					'fileid'=> '10' ,
					'producttypeid' => 1
		));

		$products = Product::create(
		array(
					'productname' => 'Upper Cottage #29',
					'productdesc' => '20-22 persons.',
					'productquantity' => '1',
					'productprice' => '1800',
					'fileid'=> '10' ,
					'producttypeid' => 1
		));

		$products = Product::create(
		array(
					'productname' => 'Upper Cottage #30',
					'productdesc' => '20-22 persons.',
					'productquantity' => '1',
					'productprice' => '1800',
					'fileid'=> '10' ,
					'producttypeid' => 1
		));

		$products = Product::create(
		array(
					'productname' => 'Upper Cottage #31',
					'productdesc' => '20-22 persons.',
					'productquantity' => '1',
					'productprice' => '1800',
					'fileid'=> '10' ,
					'producttypeid' => 1
		));

		$products = Product::create(
		array(
					'productname' => 'Cottage #32',
					'productdesc' => '18 persons.',
					'productquantity' => '1',
					'productprice' => '1000',
					'fileid'=> '10' ,
					'producttypeid' => 1
		));
		$products = Product::create(
		array(
					'productname' => 'Cottage #33',
					'productdesc' => '18 persons.',
					'productquantity' => '1',
					'productprice' => '1000',
					'fileid'=> '10' ,
					'producttypeid' => 1
		));

		$products = Product::create(
		array(
					'productname' => 'Gazebo',
					'productdesc' => '35 persons. With faucet and grill.',
					'productquantity' => '1',
					'productprice' => '2500',
					'fileid'=> '10' ,
					'producttypeid' => 1
		));

		$products = Product::create(
		array(
					'productname' => 'Tree House',
					'productdesc' => '25 persons.',
					'productquantity' => '1',
					'productprice' => '2500',
					'fileid'=> '10' ,
					'producttypeid' => 1
		));


		$products->save();
	}
}