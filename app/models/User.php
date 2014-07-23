<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\UserTrait;

class User extends Entity implements UserInterface
{
    use UserTrait;
    
    protected $rules = ['login'    => 'required|min:3|max:20|unique:users',
				  		'password' => 'required|min:3|max:20',
			      		'name'     => 'alpha',
                  		'surname'  => 'alpha'];
    
    protected $rulesLogin = ['login'    => 'required|min:3|max:20',
				  		     'password' => 'required|min:3|max:20'];

    public $timestamps = false;
    
	public function posts() 
    {
		return $this->hasMany('Post');
	}
    
    public function validateLogin($data)
    {
        $validator = Validator::make($data, $this->rulesLogin);
        
        if($validator->fails())
        {
            $this->errors = $validator->errors();
            return false;
        }

        return true;
    }
}