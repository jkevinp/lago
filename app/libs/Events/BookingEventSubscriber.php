<?php
namespace Sunrock\Events;

use Illuminate\Session\SessionManager;
use Helpers;
use Sunrock\Interfaces\MailsRepository;
use MailsController;
use App;
use HTML;
use PDFController;
use SiteContents;
class BookingEventSubscriber 
{
 
  public function onCreate($input ,$count)
  { 
    if($count === 0)
    Helpers::SendMail('emails.auth.welcome',
                      [     'email' => $input['Email'] , 
                            'Lastname' => $input['Lastname'] ,
                            'Firstname' => $input['Firstname'],
                            'Middlename' => $input['Middlename'],
                            'confirmation_code' => $input['confirmation_code']
                      ], 
                      [
                            'title' => 'Verify your account.[No-reply]' , 
                            'email' => $input['Email'] , 
                            'Lastname' => $input['Lastname'] ,
                            'Firstname' => $input['Firstname']
                      ]
                      );
  $pdfController =  App::make('PDFController');
  $file = $pdfController->reservationSlip($input['id'], $input['bookingid']);
  Helpers::SendMail('emails.auth.reservation-confirmation',
                      [     'fee' => $input['fee'],
                            'Firstname' => $input['Firstname'] ,
                            'Middlename' => $input['Middlename'], 
                            'Lastname' => $input['Lastname'], 
                            'authid' => $input['id'] ,
                            'confirmation_code' => $input['confirmation_code'],
                            'bookingid' => $input['bookingid'],
                            'paymenttype' => $input['paymenttype']
                      ], 
                      [
                           'title' => 'Reservation Confirmation.[No-reply]' ,
                           'email' => $input['Email'] , 
                           'Lastname' => $input['Lastname'] , 
                           'Firstname' => $input['Firstname'],
                           'fileas' => 'booking.pdf',
                       ], $file
                       );
    Helpers::SendMail('emails.auth.notification', 
                      ['title' => 'A new reservation was booked!' ,
                      'content' => $input['bookingid'] ],
                      ['email' => SiteContents::where('title' ,'email')->first()->value ,
                      'title' => 'New Reservation notification' ,
                      'Firstname' => 'auto' , 
                      'Lastname' => 'Notification.']);
    $mailsController =  App::make('MailsController');
    $mailsController->mail->create(
                    [
                      'sendername' => 'System',
                      'senderemail' => SiteContents::where('title' ,'email')->first()->value,
                      'receiveremail' => SiteContents::where('title' ,'email')->first()->value,
                      'receivername' => 'System',
                      'subject' => 'New Reservation',
                      'message' => 'A new reservation was booked.<br/> Booking id: '.$input['bookingid'].'<br/>Booked by: '.$input['Firstname']." ".$input['Lastname'],
                      'status' => 5
                    ]
                  );
   
  }
  public function onUpdate($event)
  {
    
  }
  public function onConfirm($account ,$id)
  {
       $pdfController =  App::make('PDFController');
       $file = $pdfController->receiptCustomerOnly($id);
       
       Helpers::SendMail(
                      'emails.auth.transaction-confirmed',
                      [     
                            'Firstname' => $account->firstname ,
                            'Middlename' => $account->middleName, 
                            'Lastname' =>  $account->lastName, 
                            'authid' =>  $account->id ,

                      ], 
                      [
                           'title' => 'Transaction Confirmed.[No-reply]' ,
                           'email' =>  $account->email , 
                           'Lastname' =>  $account->lastName , 
                           'Firstname' =>$account->firstname,
                           'fileas' => 'transaction-invoice.pdf',
                       ], $file
                       );

    $mailsController =  App::make('MailsController');
    $mailsController->mail->create(
                    [
                      'sendername' => 'System',
                      'senderemail' => SiteContents::where('title' ,'email')->first()->value,
                      'receiveremail' => $account->email,
                      'receivername' => $account->firstname." ".$account->lastName,
                      'subject' => 'Reservation has been approved.',
                      'message' => 'Your reservation with Booking id: '.$id.' has been approved.',
                      'status' => 5
                    ]
                  );
  }
  public function subscribe($events)
  {
    $events->listen('book.confirm', 'Sunrock\Events\BookingEventSubscriber@onConfirm');
    $events->listen('book.store', 'Sunrock\Events\BookingEventSubscriber@onCreate');
    $events->listen('book.update', 'Sunrock\Events\BookingEventSubscriber@onUpdate');
  }
 
}


