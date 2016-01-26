<?php
namespace Sunrock\Events;

use Illuminate\Session\SessionManager;
use Illuminate\Queue\QueueInterface;
use Illuminate\Queue\QueueManager ;
use Illuminate\Queue\Queue;
use Carbon\Carbon;
use Helpers;

class AccountEventSubscriber 
{
  public function onCreate($account){

         Helpers::SendMail('emails.auth.welcome',
                      [     'email' => $account['email'] , 
                            'Lastname' => $account['lastname'] ,
                            'Firstname' => $account['firstname'],
                            'Middlename' => $account['middlename'],
                            'confirmation_code' => $account['confirmationcode']
                      ], 
                      [
                            'title' => '[No-reply] Verify your account.' , 
                            'email' => $account['email'], 
                            'Lastname' => $account['lastname'] ,
                            'Firstname' => $account['firstname']
                      ]
                      );
  }
  public function onUpdate($event){
    
  }
  public function onForgot($account){
      echo 'Please check your mail.';
      Helpers::SendMail('emails.auth.reminder',
                          [     'email' => $account['email'] , 
                                'Lastname' => $account['lastName'] ,
                                'Firstname' => $account['firstname'],
                                'Middlename' => $account['middleName'],
                                'confirmation_code' => $account['confirmationcode']
                          ], 

                          [
                                'title' => '[No-reply] Password Reset' , 
                                'email' => $account['email'] , 
                                'Lastname' => $account['lastName'] ,
                                'Firstname' => $account['firstname']
                          ]
                      );
      
  }
  public function subscribe($events)
  {
    $events->listen('account.sendForgot' , 'Sunrock\Events\AccountEventSubscriber@onForgot');
    $events->listen('account.create' , 'Sunrock\Events\AccountEventSubscriber@onCreate');
  }
 
}