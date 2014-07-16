<?php

namespace PhoneInfo;

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