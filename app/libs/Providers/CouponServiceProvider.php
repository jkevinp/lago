<?php

namespace Sunrock\Providers;

use Illuminate\Support\ServiceProvider;
use Sunrock\Providers\EloquentCouponRepository;
use Sunrock\Interfaces\CouponRepository;


class CouponServiceProvider extends ServiceProvider 
{
  public function register()
  {
      $this->app->bind(
      					'Sunrock\Interfaces\CouponRepository',
      					'Sunrock\Repositories\EloquentCouponRepository'
      				 );
  }
}