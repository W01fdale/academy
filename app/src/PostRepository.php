<?php

interface PostRepository extends Repository
{
    public function latest();
    
    public function own();
    
    public function find($id);
    
    public function all();
}