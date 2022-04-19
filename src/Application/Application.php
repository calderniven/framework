<?php

namespace Framework\Application;

use Framework\Exceptions\Handler;
use Framework\Http\Request;
use Framework\Support\Greeter;

class Application
{
    public ?Request $request = null;
    
    public function boot()
    {
        Handler::register();
        $this->request = new Request($_SERVER);
    }
    
    public function run()
    {
        if ($this->request->uri == '/') {
            (new Greeter('Calder'))->sayHello();
        }

        if ($this->request->uri == '/about') {
            (new Greeter('You dirty dawg!'))->sayHello();
        }
    }
}