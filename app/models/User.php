<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\UserTrait;

class User extends Eloquent implements UserInterface {
    use UserTrait;
    
	protected $fillable = ['id', 'first_name', 'last_name', 'login', 'password']; 
    public $timestamps = false;
  	
	public function posts() {
		return $this->hasMany('Post');
	}	
}