<?php

use Illuminate\Routing\Controller;
use PostRepository as Post;
use UserRepository as User;

class PostController extends Controller {
	protected $layout;
    private $repository;
    
    public function __construct(PostRepository $repo) {
    	$this->beforeFilter('auth', ['except' => ['index', 'show']]);    
        $this->repository = $repo;
    }
    
    public function setupLayout() {
        $this->layout = View::make('layouts.main');
    }

	public function index()
	{
        $this->layout->with('page_info', 'Свежие посты')
					 ->content = View::make('posts')->with('posts', $this->repository->latest()->with('user')->get());
	}
    
    public function own()
    {
    	$this->layout->with('page_info', 'Свои посты')
					 ->content = View::make('posts')->with('posts', $this->repository->own()->with('user')->get());    
    }

	public function create()
	{
        $this->layout->with('page_info', 'Создание поста')
					 ->content = View::make('forms.post_create');
	}

	public function store()
	{
		$post = $this->repository->create();

		if (!$post->validate(Input::all())) {
			return Redirect::to('/posts/create')
				->withErrors($post->errors())
				->withInput(Input::except('_token'));
            
		} else {
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
        $post = $this->repository->find($id);

		if (!$post->validate(Input::all())) {
			return Redirect::to('/posts/' . $id . '/edit/')
				->withErrors($post->errors())
				->withInput(Input::except('_token'));
            
		} else {
            $post->title = Input::get('title');
            $post->content = Input::get('content');
            
            $post->save();
            return Redirect::action('PostController@index')->with(['message' => 'Пост успешно обновлён']);
		}
	}

	public function destroy($id)
	{
		$this->repository->find($id)->delete();        
        return Redirect::action('PostController@index')->with('message', 'Пост успешно удалён');
	}
}
