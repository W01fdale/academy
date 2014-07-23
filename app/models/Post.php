<?php

class Post extends Entity {
    protected $fillable = ['id', 'title', 'content', 'created_at', 'updated_at', 'user_id'];    	
    
    protected $rules = ['title'    => 'required|min:5|max:127',
                  'content'  => 'required|min:10|max:1023'];	
	
    public function user() 
    {
        return $this->belongsTo('User');
    }
    
    public function scopeLatest($query)
    {
        return $query->orderBy('created_at', 'desc')->take(10);
    }
    
    public function scopeOwn($query) 
    {
        return $query->where('id', '=', Auth::user()->id)->orderBy('created_at', 'desc')->take(10);
    }
}