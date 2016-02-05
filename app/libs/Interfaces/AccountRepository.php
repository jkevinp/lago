<?php
//List of methods in elo
namespace Sunrock\Interfaces;
interface AccountRepository
{
	public function all();
	public function find($id);
	public function paginate();
	public function create($input ,$userGroup, $active);
	public function changeStatus($account);
	public function updatePassword($account,$oldPassword ,$newPassword, $active= 1);
	public function findByEmail($email);
	public function findByEmailCode($email ,$code);
	public function findByCode( $code);
	public function generateAccountId();
	public function search($keyword);
	public function edit($id,$input ,$userGroup);
	public function Lock($account);
}