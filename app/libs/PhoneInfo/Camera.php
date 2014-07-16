<?php

namespace PhoneInfo;

class Camera {
	protected $value;
    
    public function __construct($value = '16') {
        $this->value = $value;
    }
    
    public function info() {
        return $this->value . ' MP camera';
    }
}
