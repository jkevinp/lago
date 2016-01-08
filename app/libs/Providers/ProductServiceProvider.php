<?php

namespace Sunrock\Providers;
use Illuminate\Support\ServiceProvider;
use Sunrock\Interfaces\ProductRepository;
use Sunrock\Repositories\EloquentProductRepository;

class ProductServiceProvider extends ServiceProvider 
{
  public function register()
  {
      $this->app->bind('Sunrock\Interfaces\ProductRepository', 
      					'Sunrock\Repositories\EloquentProductRepository');
  }
}