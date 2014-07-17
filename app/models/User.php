<?php

class User extends Eloquent {
	$fillable = ["first_name", "last_name", "login", "password"];
        
  	/*
	public function posts() {
		return $this->hasMany('Post');
	}
	*/
}

