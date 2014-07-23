<?php
 
use Illuminate\Support\ServiceProvider;
 
class StorageServiceProvider extends ServiceProvider {
 
  public function register()
  {
    $this->app->bind(
      'UserRepository',
      'EloquentUserRepository'
    );
      
    $this->app->bind(
      'PostRepository',
      'EloquentPostRepository'
    );
  } 
}