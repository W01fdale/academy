<?php

namespace PhoneInfo;

class Battery {
	protected $value;
    
    public function __construct($value = '2800') {
        $this->value = $value;
    }
    
    public function info() {
        return $this->value . ' mAh battery';
    }
}

?>