<?php
//List of methods in elo
namespace Sunrock\Interfaces;
interface SaleRepository{
	public function create($id,$productid,$qty,$price, $transactionid ,$type);
	public function find($id);
	public function compute($id);
	public function all();
	public function findByTransactionId();
	public function generateId();
		public function findByCartId($id);
}