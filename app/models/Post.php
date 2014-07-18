<?php

class Posts extends Eloquent {
    $fillable = ['title', 'content', 'created_at', 'updated_at', 'user_id'];
	
    public function user() {
        $this->hasOne('User');
    }
    
    public function scopeLatest() {
        return self::all()->orderBy('id')->take(10);
    }
}