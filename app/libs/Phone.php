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

class Model {
	protected $value;
    
    public function __construct($value = 'G900H Galaxy S5') {
        $this->value = $value;
    }
    
    public function info() {
        return $this->value;
    }
}
    
class CPU {
	protected $value;
    
    public function __construct($value = 'Exynos 5422 (Quad 1.9 ГГц + Quad 1.3 ГГц)') {
        $this->value = $value;
    }
    
    public function info() {
        return $this->value . ' CPU';
    }
}

class Display {
	protected $value;
    
    public function __construct($value = '5.1') {
        $this->value = $value;
    }
    
    public function info() {
        return $this->value . '\'\' display';
    }
}

class Camera {
	protected $value;
    
    public function __construct($value = '16') {
        $this->value = $value;
    }
    
    public function info() {
        return $this->value . ' MP camera';
    }
}

class Battery {
	protected $value;
    
    public function __construct($value = '2800') {
        $this->value = $value;
    }
    
    public function info() {
        return $this->value . ' mAh battery';
    }
}

class Phone {
    protected $model, $vendor, $cpu, $display, $camera, $battery;
    
    public function __construct(Vendor $vendor, Model $model, CPU $cpu, Display $display, Camera $camera, Battery $battery) {
        $this->model = $model;
        $this->vendor = $vendor;
        $this->cpu = $cpu;
        $this->display = $display;
        $this->camera = $camera;
        $this->battery = $battery;
    }
    
    public function info() {
        return $this->vendor->info(). ' ' . $this->model->info() . ', ' . $this->cpu->info() . ', ' .
               $this->display->info() . ', ' . $this->camera->info() . ', ' .
               $this->battery->info();
    }
}

?>