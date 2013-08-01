<?php
return array(
    'zf-rpc' => array(
        'HelloWorld' => array(
            'callable' => 'ZFApiFirstExample\Controller\MyRpcController::hello'
        ),
    ),
    'router' => array(
        'routes' => array(
            'rpc-hello-world' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/api-first-example/hello',
                    'defaults' => array(
                        'controller' => 'HelloWorld',
                    ),
                ),
            ),
        ),
    ),
);
