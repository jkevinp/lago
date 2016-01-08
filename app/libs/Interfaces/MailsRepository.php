<?php
//List of methods in elo
namespace Sunrock\Interfaces;
interface MailsRepository
{
	public function all();
	public function find($id);
	public function paginate();
	public function create($info);
	public function generateId();
}