<?php

use Illuminate\Routing\Controller;

class PostController extends Controller {
	protected $layout;
    
    public function __construct() {
    	$this->beforeFilter('auth', ['except' => ['index', 'show']]);    
    }
    
    public function setupLayout() {
        $this->layout = View::make('layouts.main');
    }

	public function index()
	{
        $this->layout->with('page_info', 'Свежие посты')
					 ->content = View::make('posts')->with('posts', Post::latest()->with('user')->get());
	}
    
    public function own()
    {
    	$this->layout->with('page_info', 'Свои посты')
					 ->content = View::make('posts')->with('posts', Post::own()->with('user')->get());    
    }

	public function create()
	{
        $this->layout->with('page_info', 'Создание поста')
					 ->content = View::make('forms.post_create');
	}

	public function store()
	{
		$rules = ['title'    => 'required|min:5|max:127',
                  'content'  => 'required|min:10|max:1023'];		
        
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::to('/posts/create')
				->withErrors($validator)
				->withInput(Input::except('_token'));
            
		} else {
            $post = new Post;
            
            $post->title = Input::get('title');
            $post->content = Input::get('content');
            $post->user_id = Auth::user()->id;
            
            $post->save();
            return Redirect::action('PostController@index')->with(['message' => 'Пост успешно опубликован']);
		}
	}

	public function show($id)
	{
        $this->layout->with('page_info', 'Просмотр поста ')
                     ->content = View::make('post')->with('post', Post::find($id)->with('user')->get());
	}

	public function edit($id)
	{
        $this->layout->with('page_info', 'Редактирование поста')
					 ->content = View::make('forms.post_create')->with('post', Post::find($id)->get());        
	}

	public function update($id)
	{
		$rules = ['title'    => 'required|min:5|max:127',
          		  'content'  => 'required|min:10|max:1023'];		
        
		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			return Redirect::to('/posts/' . $id . '/edit/')
				->withErrors($validator)
				->withInput(Input::except('_token'));
            
		} else {
            $post = Post::find($id);
            
            $post->title = Input::get('title');
            $post->content = Input::get('content');
            
            $post->save();
            return Redirect::action('PostController@index')->with(['message' => 'Пост успешно обновлён']);
		}
	}

	public function destroy($id)
	{
		Post::find($id)->delete();        
        return Redirect::action('PostController@index')->with('message', 'Пост успешно удалён');
	}
}
