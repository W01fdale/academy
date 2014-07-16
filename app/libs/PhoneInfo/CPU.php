<?php

namespace PhoneInfo;

class CPU {
	protected $value;
    
    public function __construct($value = 'Exynos 5422 (Quad 1.9 ГГц + Quad 1.3 ГГц)') {
        $this->value = $value;
    }
    
    public function info() {
        return $this->value . ' CPU';
    }
}