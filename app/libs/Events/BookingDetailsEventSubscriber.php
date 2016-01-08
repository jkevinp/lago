<?php
namespace Sunrock\Events;

use Illuminate\Session\SessionManager;
use Illuminate\Queue\QueueInterface;
use Illuminate\Queue\QueueManager ;
use Illuminate\Queue\Queue;
use Carbon\Carbon;
use BookingDetailsController;
class BookingDetailsEventSubscriber 
{
  public function onCreate($token)
  {
      
  }
  public function onUpdate($event)
  {
    
  }
  public function subscribe($events)
  {
    $events->listen('bookingdetails.create', 'Sunrock\Events\BookingDetailsEventSubscriber@onCreate');
    $events->listen('bookingdetails.update', 'Sunrock\Events\BookingDetailsEventSubscriber@onUpdate');
  }
 
}