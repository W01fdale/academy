<?php

namespace PhoneInfo;

class Display {
	protected $value;
    
    public function __construct($value = '5.1') {
        $this->value = $value;
    }
    
    public function info() {
        return $this->value . '\'\' display';
    }
}

?>