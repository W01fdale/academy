<?php

use Illuminate\Routing\Controller;

class HelloController extends Controller {
  	const HELLO_TEMPLATE = "Hello, ", DEFAULT_NAME   = "anonymous";

    public function say($name = "") {
    	$greeting = self::HELLO_TEMPLATE . (!empty($name) ? $name : self::DEFAULT_NAME) . "!";
        return View::make('/greeting', array('greeting' => $greeting));
    }
}

?>