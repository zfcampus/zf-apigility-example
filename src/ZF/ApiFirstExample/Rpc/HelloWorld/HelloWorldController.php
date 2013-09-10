<?php

namespace ZF\ApiFirstExample\Rpc\HelloWorld;

class HelloWorldController
{
    public function hello()
    {
        return array('message' => 'Hello world');
    }
}
