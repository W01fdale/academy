<?php

class PostController extends \BaseController {
	protected $layout;
    
    public function setupLayout() {
        $this->layout = View::make('layouts.main');
    }
    
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$this->layout->content = View::make('posts', Post::latest()->get());
        return $this->layout->with(['page_name' => 'posts', 'page_info' => 'Свежие посты']);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		$this->layout->content = Form::create('forms.post_create', array('method' => 'POST',
                                                                 'action' => 'Post@new'));
        return $this->layout->with(['page_name' => 'post_create', 'page_info' => 'Создание поста']);
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
	public function show($id)
	{
        $post = Post::find($id);
        
		$this->layout->content = View::make('post', $post)->get();
        return $this->layout->with(['page_name' => 'post', 'page_info' => 'Просмотр поста ' . $post->user()->login]);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$this->layout->content = View::make('forms.post_create', Post::find($id)->get());
        return $this->layout->with(['page_name' => 'post_create', 'page_info' => 'Редактирование поста']);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Post::find($id)->delete();        
        return $this->layout->with(['page_name' => 'posts', 'page_info' => 'Пост успешно удалён']);
	}


}
