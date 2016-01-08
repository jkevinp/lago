<?php
namespace Sunrock\Repositories;

use Sunrock\Interfaces\FileRepository;
use Files;

class EloquentFileRepository implements FileRepository
{
	private $page = 6;
	public function all(){
		return Files::all();
	}

	public function find($id){
		return Files::find($id);
	}

	public function paginate(){
		return Files::paginate($this->page);
	}
	public function create($info)
	{
	
	}
	public function generateId()
	{
		return str_random(5).rand(1,10000);
	}
}