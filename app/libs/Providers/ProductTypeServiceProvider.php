<?php

namespace Sunrock\Providers;
use Illuminate\Support\ServiceProvider;
use Sunrock\Interfaces\ProductTypeRepository;
use Sunrock\Repositories\EloquentProductTypeRepository;

class ProductTypeServiceProvider extends ServiceProvider 
{
  public function register()
  {
      $this->app->bind('Sunrock\Interfaces\ProductTypeRepository', 
      					'Sunrock\Repositories\EloquentProductTypeRepository');
  }
}