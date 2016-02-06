<?php
//List of methods in elo
namespace Sunrock\Interfaces;
interface ProductRepository
{
	public function all();
	public function find($id);
	public function paginate();
	public function create($input );
	public function getReserved($date);
	public function getAvailable($date);
	public function edit($id, $input);
	public function check($date ,$id);
	public function getObject();
	public function getAvailableReservables($date);
}