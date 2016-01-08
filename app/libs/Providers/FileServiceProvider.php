<?php

namespace Sunrock\Providers;
use Illuminate\Support\ServiceProvider;
use Sunrock\Interfaces\FileRepository;
use Sunrock\Repositories\EloquentFileRepository;

class FileServiceProvider extends ServiceProvider 
{
  public function register()
  {
      $this->app->bind('Sunrock\Interfaces\FileRepository', 
      					'Sunrock\Repositories\EloquentFileRepository');
  }
}