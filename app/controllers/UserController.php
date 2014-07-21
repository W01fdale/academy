<?php

use Illuminate\Routing\Controller;

class UserController extends Controller {
    protected $layout;
    public $restful = 'true';
    
    public function __construct() {
        $this->layout = View::make('layouts.main');
        $this->beforeFilter('auth', ['only'=>['getProfile']]);
    }

	public function getRegister() {
        $this->layout->with('page_info', 'Регистрация')
            		 ->content = View::make('forms.register');
    }

	public function postCreate()
	{
		$rules = ['login'    => 'required|min:3|max:20|unique:users',
				  'password' => 'required|min:3|max:20',
			      'name'     => 'alpha',
                  'surname'  => 'alpha'];		
        
		$validator = Validator::make(Input::except('_token'), $rules);

		if ($validator->fails()) {
			return Redirect::to('users/register')
				->withErrors($validator)
				->withInput(Input::except('password'))
                ->with('message', 'Данные введены некорректно.');
            
		} else {
            $user = new User;
            
            $user->login = Input::get('login');
            $user->password = Hash::make(Input::get('password'));
            $user->first_name = Input::get('first_name');
            $user->last_name = Input::get('last_name');
			
            $user->save();
			
            Auth::login($user);
			return Redirect::to('posts')->with('message', 'Вы успешно зарегистрировались.');			
		}
	}

	public function getProfile()
	{
        $this->layout->with('page_info', 'Профиль')
					 ->content = View::make('profile', Auth::user());
	}

    public function getLogin() {
        $this->layout->with('page_info', 'Авторизация')
            		 ->content = View::make('forms.login');
    }
    
    public function postSignin() {
        $rules = ['login'    => 'required|min:3|max:20',
				  'password' => 'required|min:3|max:20'];
        
		$validator = Validator::make(Input::except('_token'), $rules);

		if ($validator->fails()) 
			return Redirect::action('UserController@getLogin')
				->withErrors($validator)
				->withInput(Input::except('password'));
            
        $user = ['login' => Input::get('login'),
                 'password' => Input::get('password')];
        
        if (Auth::attempt($user)) {
            return Redirect::to('posts')
                				->with('message', 'Вы успешно вошли.');
        }
        
        return Redirect::route('login')
            ->with('message', 'Пользователя с такими данными не существует. Возможно, данные были введены неверно.')
            ->withInput(Input::except('password'));
    }
    
    public function getLogout() {
		Auth::logout();
		return Redirect::to('posts')->with('message', 'Вы успешно вышли.');
	}
}
