<?php

class Posts extends Eloquent {
    $fillable = ['title', 'content', 'created_at', 'updated_at', 'user_id'];
	
    public function user() {
        $this->hasOne('User');
    }
    
    public function scopeLatest($query)
    {
        return $query->orderBy('created_at')->take(10);
    }
}