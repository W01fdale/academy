<?php

namespace PhoneInfo;

class Model {
	protected $value;
    
    public function __construct($value = 'G900H Galaxy S5') {
        $this->value = $value;
    }
    
    public function info() {
        return $this->value;
    }
}