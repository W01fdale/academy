<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\UserTrait;

class User extends Entity {
    use UserTrait;
    
	protected $fillable = ['id', 'first_name', 'last_name', 'login', 'password']; 
    
    public $timestamps = false;
    
    protected $rules = ['login'    => 'required|min:3|max:20|unique:users',
				  		'password' => 'required|min:3|max:20',
			      		'name'     => 'alpha',
                  		'surname'  => 'alpha'];

	public function posts() {
		return $this->hasMany('Post');
	}
}