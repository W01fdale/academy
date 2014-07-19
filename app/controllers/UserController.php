<?php

class UserController extends \BaseController {
    protected $layout;
    
    public function setupLayout() {
        $this->layout = View::make('layouts.main');
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function register()
	{
		$this->layout->content = View::make('forms.registration');
        return $this->layout->with(['page_name' => 'registration', 'page_info' => 'Регистрация нового пользователя']);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function profile($id)
	{
		$this->layout->content = View::make('layouts.')
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function delete($id)
	{
		//
	}
}
