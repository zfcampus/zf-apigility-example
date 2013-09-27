<?php

namespace ZF\Apigility\Example\V1\Rpc\HelloWorld;

class HelloWorldController
{
    public function hello()
    {
        return array('message' => 'Hello world');
    }
}
