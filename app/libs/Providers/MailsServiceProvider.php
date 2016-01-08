<?php
namespace Sunrock\Providers;

use Illuminate\Support\ServiceProvider;
use Sunrock\Interfaces\MailsRepository;
use Sunrock\Repositories\EloquentMailsRepository;

class MailsServiceProvider extends ServiceProvider 
{
  public function register()
  {
      $this->app->bind(	
      					'Sunrock\Interfaces\MailsRepository', 
      					'Sunrock\Repositories\EloquentMailsRepository'
      				);
  }
}