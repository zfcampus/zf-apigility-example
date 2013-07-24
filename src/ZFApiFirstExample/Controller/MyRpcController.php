<?php

namespace ZFApiFirstExample\Controller;

class MyRpcController
{
    public function hello()
    {
        return array('message' => 'Hello world');
    }
}