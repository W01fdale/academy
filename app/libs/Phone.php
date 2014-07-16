<?php

namespace PhoneInfo;

class Model { 
    const $default = 'G900H Galaxy S5';
    protected $info;
    
    public function getInfo() {
        return !empty($info) ? $info : $default;
    }
}

class Vendor { 
    const $default = 'Samsung';
    protected $info;
    
    public function getInfo() {
        return !empty($info) ? $info : $default;
    }
}

class CPU { 
    const $default = 'Exynos 5422 (Quad 1.9 ГГц + Quad 1.3 ГГц)';
    protected $info;
    
    public function getInfo() {
        return !empty($info) ? $info : $default;
    }
}

class Camera { 
    const $default = '16';
    protected $info;
    
    public function getInfo() {
        return !empty($info) ? $info : $default;
    }
}

class Battery { 
    const $default = '2800';
    protected $info;
    
    public function getInfo() {
        return !empty($info) ? $info : $default;
    }
}

class Display { 
    const $default = '5.1';
    protected $info;
    
    public function getInfo() {
        return !empty($info) ? $info : $default;
    }
}

class Phone {
    protected $model, $vendor, $cpu, $display, $camera, $battery;
    
    public function __construct(Model $model, Vendor $vendor, CPU $cpu, Display $display, Camera $camera, Battery $battery) {
        $this->model = $model;
        $this->vendor = $vendor;
        $this->cpu = $cpu;
        $this->display = $display;
        $this->camera = $camera;
        $this->battery = $battery;
    }
    
    public function getInfo() {
        return $this->vendor->getInfo() . ' ' . $this->model->getInfo() . ', ' . $this->cpu->getInfo() .
               $this->display->getInfo() . '\'\' display, ' . $this->camera->getInfo() . 'MP camera' .
               $this->battery->getInfo() . ' mAh battery.';
    }
}

?>