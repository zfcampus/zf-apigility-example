<?php
return array(
    'zf-rpc' => array(
        array(
            'route' => array(
                'methods'      => 'GET',
                'url'          => '/api-first-example/hello',
                'dispatchable' => 'ZFApiFirstExample\Controller\MyRpcController::hello'
            ),
        )
    )
);
