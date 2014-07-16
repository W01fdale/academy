<?php

use Illuminate\Routing\Controller;

class PhoneController extends Controller {

	public function info() {
    	return App::make('PhoneInfo\Phone')->getInfo();
    }    
}

?>