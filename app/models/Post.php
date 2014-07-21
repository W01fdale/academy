<?php

class Post extends Eloquent {
    protected $fillable = ['id', 'title', 'content', 'created_at', 'updated_at', 'user_id'];
	
    public function user() {
        return $this->belongsTo('User');
    }
    
    public function scopeLatest($query)
    {
        return $query->orderBy('created_at')->take(10);
    }
    
    public function scopeOwn($query, $id) {
        return $query->where('id', '=', $id)->orderBy('created_at')->take(10);
    }
}