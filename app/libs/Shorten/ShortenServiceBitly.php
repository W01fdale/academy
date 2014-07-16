<?php

namespace Shorten;

class ShortenServiceBitly implements ShortenInterface {
   // protected $shortener = Bitly::setAccessToken('85bd9ebc7e0229c8067cb980291a98d565cd9757');
    
    public function shorten($url) {
    	return 'fuck';//$shortener->shorten($url)->getResponseData()['data']['url'];
    }
}
?>