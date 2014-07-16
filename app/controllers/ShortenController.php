<?php

use Illuminate\Routing\Controller;
use Shorten\ShortenInterface;

class ShortenController extends Controller {
    protected $service;
    
    public function __construct(ShortenInterface $shortenService) {
        $this->service = $shortenService;
    }

    public function shorten($url = 'http://google.com') {
    	return $url . ' -> ' . $this->service->shorten($url);
    }
}