<?php

foreach (Post::with('User')->scopeLatest() as $post)
{
    echo View::make('post', $post);
}