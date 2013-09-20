<?php

namespace ZF\Apigility\Example\Rpc\HelloWorld;

class HelloWorldController
{
    public function hello()
    {
        return array('message' => 'Hello world');
    }
}
