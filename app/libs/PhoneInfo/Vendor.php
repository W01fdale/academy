<?php

namespace PhoneInfo;

class Vendor {
	protected $value;
    
    public function __construct($value = 'Samsung') {
        $this->value = $value;
    }
    
    public function info() {
        return $this->value;
    }
}