<?php
return array(
    'zf-rpc' => array(
	'HelloWorld' => 'ZFApiFirstExample\Controller\MyRpcController::hello'
    ),
    'zf-content-negotiation' => array(
	'controllers' => array(
	    'HelloWorld' => 'HalJson'
	)
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
