<?php

class EloquentPostRepository implements PostRepository
{
    public function latest()
    {
    	return Post::latest();
    }
    
    public function own()
    {
        return Post::own();
    }
    
    public function find($id)
    {
        return Post::find($id);
    }
    
    public function all()
    {
        return Post::all();
    }
    
    public function create()
    {
        return new Post;
    }
}