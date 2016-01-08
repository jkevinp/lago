<?php
namespace Sunrock\Repositories;

use Sunrock\Interfaces\ProductTypeRepository;
use ProductType;

class EloquentProductTypeRepository implements ProductTypeRepository
{
	private $page = 6;
	public function all(){
		return ProductType::all();
	}

	public function find($id){
		return ProductType::find($id);
	}

	public function paginate(){
		return ProductType::paginate($this->page);
	}
	public function create($info)
	{
	
	}
	public function generateId()
	{
		return str_random(5).rand(1,10000);
	}
}