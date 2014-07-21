<?php

class Post extends Eloquent {
    protected $fillable = ['id', 'title', 'content', 'created_at', 'updated_at', 'user_id'];
	
    public function user() {
        return $this->belongsTo('User');
    }
    
    public function scopeLatest($query)
    {
        return $query->orderBy('created_at', 'desc')->take(10);
    }
    
    public function scopeOwn($query) {
        return $query->where('id', '=', Auth::user()->id)->orderBy('created_at', 'desc')->take(10);
    }
}