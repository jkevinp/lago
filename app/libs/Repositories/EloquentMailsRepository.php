<?php
namespace Sunrock\Repositories;

use Sunrock\Interfaces\MailsRepository;
use Mails;

class EloquentMailsRepository implements MailsRepository
{
	private $page = 6;
	public function all(){
		return Mails::all();
	}

	public function find($id){
		return Mails::find($id);
	}

	public function paginate(){
		return Mails::paginate($this->page);
	}
	public function create($info)
	{
		$mail = Mails::create([
							'id' => $this->generateId(),
							'sendername' => $info['sendername'],
							'senderemail' => $info['senderemail'],
							'receiveremail' => $info['receiveremail'],
							'receivername' => $info['receivername'],
							'subject' => $info['subject'],
							'message' => $info['message'],
							'status' => 5
							]);
		return $mail;
	}
	public function generateId()
	{
		return str_random(5).rand(1,10000);
	}
	public function delete($id)
	{
		$mail = $this->find($id);
		return $mail->delete();
	}
}