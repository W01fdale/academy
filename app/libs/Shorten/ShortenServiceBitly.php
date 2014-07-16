<?php

namespace Shorten;

use Contrib\Component\Service\Bitly\V3\BitlyApiFactory;
use Contrib\Component\Service\Bitly\V3\Api\Links;

class ShortenServiceBitly implements ShortenInterface {
    protected $bitly;    

    public function __construct() {
        $this->bitly = new BitlyApiFactory("85bd9ebc7e0229c8067cb980291a98d565cd9757")->getLinks('array');
    }
    
    public function shorten($url) {
    	return 'shorten';//$this->bitly->(array("longUrl" => $url))["data"]["url"];
    }
}
?>