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
        $this->layout->with(['page_name' => 'posts', 'page_info' => 'Свежие посты'])
					 ->content = View::make('posts')->with('posts', Post::latest()->with('user')->get());
	}
    
    public function own()
    {
    	$this->layout->with(['page_name' => 'posts', 'page_info' => 'Свои посты'])
					 ->content = View::make('posts')->with('posts', Post::own()->with('user')->get());    
    }

	public function create()
	{
        $this->layout->with(['page_name' => 'post_create', 'page_info' => 'Создание поста'])
					 ->content = View::make('forms.post_create');
	}

	public function store()
	{
		$rules = ['title'    => 'required|min:10|max:127',
                  'content'  => 'required|min:20|max:1023'];		
        
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
        $post = Post::find($id)->get();
        
        $this->layout->with(['page_name' => 'post', 'page_info' => 'Просмотр поста ' . $post->user()->login])
                     ->content = View::make('post', $post);
	}

	public function edit($id)
	{
        $this->layout->with(['page_name' => 'post_create', 'page_info' => 'Редактирование поста'])
					 ->content = View::make('forms.post_create', Post::find($id)->get());        
	}

	public function update($id)
	{
		//
	}

	public function destroy($id)
	{
		Post::find($id)->delete();        
        Session::flash('message', 'Пост успешно удалён!');
        Redirect::to('/');
	}
}
