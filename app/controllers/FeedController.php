<?php

use Illuminate\Routing\Controller;

class FeedController extends Controller {
    
    public function index() {
    	return View::make('main.index');
    }
}

?>