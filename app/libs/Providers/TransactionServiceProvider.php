<?php

namespace Sunrock\Providers;
use Illuminate\Support\ServiceProvider;
use Sunrock\Interfaces\TransactionRepository;
use Sunrock\Repositories\EloquentTransactionsRepository;

class TransactionServiceProvider extends ServiceProvider 
{
  public function register()
  {
      $this->app->bind('Sunrock\Interfaces\TransactionRepository', 
      					'Sunrock\Repositories\EloquentTransactionsRepository');
  }
}