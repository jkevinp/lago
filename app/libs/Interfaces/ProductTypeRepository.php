<?php namespace Sunrock\Interfaces;
interface ProductTypeRepository{
	public function all();
	public function find($id);
	public function paginate();
	public function create($info);
	public function generateId();
}