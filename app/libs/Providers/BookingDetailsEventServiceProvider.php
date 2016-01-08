<?php

namespace Sunrock\Providers;

use Illuminate\Support\ServiceProvider;
use Sunrock\Events\BookingDetailsEventSubscriber;
use Sunrock\Providers\EloquentBookingDetailsRepository;
use Sunrock\Interfaces\BookingDetailsRepository;


class BookingDetailsEventServiceProvider extends ServiceProvider 
{
  public function register()
  {
      $this->app->events->subscribe(new BookingDetailsEventSubscriber);
      $this->app->bind(
      					'Sunrock\Interfaces\BookingDetailsRepository',
      					'Sunrock\Repositories\EloquentBookingDetailsRepository'
      				 );
  }
}