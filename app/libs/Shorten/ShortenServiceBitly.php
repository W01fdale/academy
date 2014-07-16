<?php

namespace Shorten;

use Contrib\Component\Service\Bitly\V3\BitlyApiFactory;
use Contrib\Component\Service\Bitly\V3\Api\Links;

class ShortenServiceBitly implements ShortenInterface {
    protected $bitly, $token, $api;    

    public function __construct() {
        $this->token = self::getToken();
        $this->bitly = (new BitlyApiFactory($this->token));
    }
    
    public function shorten($url) {
        if(!isset($this->api['links']))
            $this->api['links'] = $this->bitly->getLinks();
        
    	return $this->api['links']->shorten(array("longUrl" => $url))["url"];
    }
    
    protected static function getToken() {
        return parse_ini_file("/home/codio/workspace/app/config/shorten_config.ini", true)[__CLASS__]["token"];
    }
}
?>