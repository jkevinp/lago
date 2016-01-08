<?php
//List of methods in elo
namespace Sunrock\Interfaces;
interface BookingRepository
{
	public function all();
	public function find($id);
	public function paginate();
	public function create($input);
	public function countDays($date1, $date2);
	public function generateBookingId();
	public function generateBookingReference($firstname, $lastname);
	public function changeStatus($id,$status);
	public function getStartingToday();
	public function getEndingToday();
	public function getNotAttended();
	public function getObject();
	public function search($keyword);

}