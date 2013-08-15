<?php

namespace ZF\ApiFirstExample\Controller;

class MyRpcController
{
    public function hello()
    {
        return array('message' => 'Hello world');
    }
}
