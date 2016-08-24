<?php
use Sunrock\Interfaces\MailsRepository as MailsRepo;
use Sunrock\Interfaces\AccountRepository as Arepo;
class MailsController extends BaseController 
{
	public function __construct(MailsRepo $mails , Arepo $arepo)
  	{
    	$this->mail = $mails;
    	$this->account = $arepo;
  	}
  	public function create(){
  		$input = Input::all();
  		$rules = [
  					'receiveremail' => 'required|email',
  					'subject' => 'required',
  					'message' => 'required|max:255'
  				];
  		$val = Validator::make($input, $rules);
  		if($val->fails()) return Redirect::back()->withErrors($val->messages())->withInput($input);

  		$find = $this->account->findByEmail($input['receiveremail'])->first();
      if($find)
  		{
    			$input['receivername'] = $find['firstname'].' '.$find['middleName'].' '.$find['lastName'];	
    			$result = $this->mail->create($input);
    			if($result){
    				SessionController::flash('A new Message has been sent to '.$result->receiveremail);
    				return Redirect::back();
    			}
    			else return Redirect::back()->withErrors('Could not send message!')->withInput($input);
    		}
    		else return Redirect::back()->withErrors('Could not find a user with the provided receiver email. <br/><u>'.$input['receiveremail'].'</u>')->withInput($input);
  	}
  	public function delete($id)
  	{
  		$find = $this->mail->find($id)->first();
  		if($find)
  		{
  			if($this->mail->delete($find->id))
  			{
  				SessionController::flash('Mail has been deleted');
  				return Redirect::back();
  			}else Redirect::back()->withErrors('Mail or Message does deletion failed.');
  		}
  		return Redirect::back()->withErrors('Mail or Message does not exist.');
  	}
}
