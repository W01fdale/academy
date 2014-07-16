<?php

namespace Shorten;

use Contrib\Component\Service\Bitly\V3\BitlyApiFactory;
use Contrib\Component\Service\Bitly\V3\Api\Links;
use Contrib\Component\Service\Bitly\V3\Request\RestClient;
use Contrib\Component\Service\Bitly\V3\Response\BitlyResponse;
use Contrib\Component\Service\Bitly\V3\Response\Bitly;

class ShortenServiceBitly implements ShortenInterface {
    protected $bitly;    

    public function __construct() {
        $this->bitly = new BitlyApiFactory("85bd9ebc7e0229c8067cb980291a98d565cd9757");
        $this->bitly = $this->bitly->getLinks();
    }
    
    public function shorten($url) {
    	return $this->bitly->shorten(array("longUrl" => $url))["url"];
    }
}
?>