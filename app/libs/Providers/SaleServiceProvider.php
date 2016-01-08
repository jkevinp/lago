<?php

namespace Sunrock\Providers;
use Illuminate\Support\ServiceProvider;
use Sunrock\Interfaces\SaleRepository;
use Sunrock\Repositories\EloquentSaleRepository;

class SaleServiceProvider extends ServiceProvider 
{
  public function register()
  {
      $this->app->bind('Sunrock\Interfaces\SaleRepository', 'Sunrock\Repositories\EloquentSaleRepository');
  }
}