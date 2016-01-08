<?php

namespace Sunrock\Providers;
use Illuminate\Support\ServiceProvider;
use Sunrock\Interfaces\AccountRepository;
use Sunrock\Repositories\EloquentAccountRepository;
use Sunrock\Events\AccountEventSubscriber;

class AccountServiceProvider extends ServiceProvider 
{
  public function register()
  {
  	 $this->app->events->subscribe(new AccountEventSubscriber);
      $this->app->bind('Sunrock\Interfaces\AccountRepository', 
      					'Sunrock\Repositories\EloquentAccountRepository');
  }
}