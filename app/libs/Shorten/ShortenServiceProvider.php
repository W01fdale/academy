<?php

namespace Shorten;

use Illuminate\Support\ServiceProvider;

class ShortenServiceProvider extends ServiceProvider {

    public function register() {
        $this->app->bind('Shorten\ShortenInterface', 'Shorten\ShortenServiceBitly');
    }

}
