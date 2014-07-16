<?php

namespace PhoneInfo;

class Phone {
    protected $model, $vendor, $cpu, $display, $camera, $battery;
    
    public function __construct($model = 'G900H Galaxy S5' , $vendor = 'Samsung', $cpu = 'Exynos 5422 (Quad 1.9 ГГц + Quad 1.3 ГГц)', $display = '5.1', $camera = '16', $battery = '2800') {
        $this->model = $model;
        $this->vendor = $vendor;
        $this->cpu = $cpu;
        $this->display = $display;
        $this->camera = $camera;
        $this->battery = $battery;
    }
    
    public function getInfo() {
        return $this->vendor. ' ' . $this->model . ', ' . $this->cpu . ', ' .
               $this->display . '\'\' display, ' . $this->camera . 'MP camera, ' .
               $this->battery . ' mAh battery.';
    }
}

?>