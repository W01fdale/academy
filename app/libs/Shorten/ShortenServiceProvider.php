<?php

namespace Shorten;

use Illuminate\Support\ServiceProvider;

class ShortenServiceProvider extends ServiceProvider {
	protected static $service_name = 'Shorten\ShortenServiceBitly';
	public static $service_token;
    
    public function register() {
        self::$service_token = parse_ini_file('/home/codio/workspace/app/config/shorten_config.ini', true)[self::$service_name]['token'];
        $this->app->bind('Shorten\ShortenInterface', self::$service_name);
    }
}

?>