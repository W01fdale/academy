<?php

foreach (Post::with('User')->latest()->get() as $post)
{
    echo View::make('post', $post);
}