<?php

namespace Shorten;

use Contrib\Component\Service\Bitly\V3\BitlyApiFactory;
use Contrib\Component\Service\Bitly\V3\Api\Links;

class ShortenServiceBitly implements ShortenInterface {
    protected $bitly, $api;    

    public function __construct() {
        $this->bitly = (new BitlyApiFactory(ShortenServiceProvider::$service_token));
    }
    
    public function shorten($url) {
        if(!isset($this->api['links']))
            $this->api['links'] = $this->bitly->getLinks();
        
    	return $this->api['links']->shorten(array("longUrl" => $url))["url"];
    }    

}