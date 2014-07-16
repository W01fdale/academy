<?php

use Illuminate\Routing\Controller;
use PhoneInfo\Phone;

class PhoneController extends Controller {

	public function info() {
    	return App::make('PhoneInfo\Phone')->info();
    }    
}

?>