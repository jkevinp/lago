<?php

namespace Sunrock\Providers;
use Illuminate\Support\ServiceProvider;
use Sunrock\Interfaces\BookingRepository;
use Sunrock\Repositories\EloquentBookingRepository;
use Sunrock\Events\BookingEventSubscriber;

class BookingServiceProvider extends ServiceProvider 
{
  public function register()
  {

      $this->app->bind(
      					'Sunrock\Interfaces\BookingRepository',
      					'Sunrock\Repositories\EloquentBookingRepository'
      				 );
      $this->app->events->subscribe(new BookingEventSubscriber);
  }
}